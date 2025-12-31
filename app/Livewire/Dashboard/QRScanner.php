<?php

namespace App\Livewire\Dashboard;

use App\Models\Booking;
use App\Traits\WithToast;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Pemindai QR'])]
class QRScanner extends Component
{
    use WithToast;

    #[On('handleScan')]
    public function handleScan(string $code): void
    {
        Log::info('QR Scan received', ['raw' => $code]);

        // Decode QR JSON
        $data = json_decode($code, true);

        if (!is_array($data) || empty($data['booking_code'])) {
            $this->toast('error', 'QR Code tidak valid');
            return;
        }

        $booking = Booking::where('booking_code', $data['booking_code'])->first();

        if (!$booking) {
            $this->toast('error', 'Kode booking tidak ditemukan');
            return;
        }

        // Sudah check-in
        if ($booking->checkin_at) {
            $this->toast(
                'warning',
                'Booking sudah check-in pada ' .
                    Carbon::parse($booking->checkin_at)->format('d M Y H:i')
            );
            return;
        }

        $now = Carbon::now();
        $bookingDate = Carbon::parse($booking->booking_date);
        $startTime = Carbon::parse("{$booking->booking_date} {$booking->start_time}");
        $endTime   = Carbon::parse("{$booking->booking_date} {$booking->end_time}");

        // Validasi tanggal
        if (!$now->isSameDay($bookingDate)) {
            $this->toast(
                'error',
                $now->lt($bookingDate)
                    ? "Belum masuk tanggal booking ({$bookingDate->format('d M Y')})"
                    : "Tanggal booking sudah terlewat"
            );
            return;
        }

        // Validasi waktu
        if ($now->lt($startTime)) {
            $this->toast('error', 'Belum masuk waktu check-in (mulai ' . $startTime->format('H:i') . ')');
            return;
        }

        if ($now->gt($endTime)) {
            $this->toast('error', 'Waktu booking sudah berakhir');
            return;
        }

        // Update booking
        $booking->update([
            'checkin_at' => $now,
            'status' => 'progress',
        ]);

        $this->toast('success', 'Check-in berhasil! Selamat menikmati venue.');

        Log::info('Check-in success', [
            'booking_code' => $booking->booking_code,
            'time' => $now
        ]);
    }


    public function render()
    {
        return view('livewire.dashboard.qr-scanner');
    }
}
