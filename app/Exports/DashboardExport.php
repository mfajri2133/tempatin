<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Venue;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DashboardExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $query = Order::with(['user', 'booking.venue', 'payment'])
            ->orderBy('created_at', 'desc');

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [
                $this->startDate . ' 00:00:00',
                $this->endDate . ' 23:59:59'
            ]);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Kode Order',
            'Nama User',
            'Email',
            'Venue',
            'Tanggal Booking',
            'Jam',
            'Durasi (jam)',
            'Total Pembayaran',
            'Status Order',
            'Status Pembayaran',
            'Tanggal Transaksi',
        ];
    }

    public function map($order): array
    {
        return [
            $order->order_code,
            $order->user->name ?? 'N/A',
            $order->user->email ?? 'N/A',
            $order->booking->venue->name ?? 'N/A',
            $order->booking->booking_date
                ? \Carbon\Carbon::parse($order->booking->booking_date)->format('d M Y')
                : 'N/A',
            ($order->booking->start_time ?? '') . ' - ' . ($order->booking->end_time ?? ''),
            $order->booking->total_hours ?? 0,
            'Rp ' . number_format($order->total_amount, 0, ',', '.'),
            ucfirst($order->status),
            $order->payment ? ucfirst($order->payment->payment_status) : 'N/A',
            $order->created_at->format('d M Y H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }

    public function title(): string
    {
        return 'Laporan Dashboard';
    }
}
