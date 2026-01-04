<?php

namespace App\Livewire\User\Histories;

use App\Models\Order;
use App\Traits\WithToast;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

#[Layout('layouts.app', ['title' => 'Detail Histori Transaksi'])]
class TransactionHistoryDetail extends Component
{
    use WithToast;
    public $orderId;
    public $order;

    public function openQr()
    {
        $this->dispatch('open-qr-modal');
    }

    public function closeQr()
    {
        $this->dispatch('close-qr-modal');
    }

    public function mount($id)
    {
        $this->orderId = $id;
        $this->loadOrder();
    }

    public function loadOrder()
    {
        $this->order = Order::with([
            'booking' => function ($query) {
                $query->with([
                    'venue' => function ($q) {
                        $q->select('id', 'name', 'address', 'city_name', 'capacity', 'price_per_hour', 'status', 'venue_img', 'category_id')
                            ->with('category:id,name');
                    },
                    'user:id,name,email,avatar'
                ]);
            },
            'payment' => function ($query) {
                $query->select('id', 'order_id', 'payment_status', 'invoice_id', 'external_id', 'paid_at', 'expired_at', 'created_at');
            },
            'user:id,name,email,avatar'
        ])
            ->where('id', $this->orderId)
            ->where('user_id', Auth::id())
            ->firstOrFail();
    }

    public function pay()
    {
        abort_if(!$this->order, 404);

        if ($this->order->status !== 'pending') {
            $this->toast('error', 'Transaksi tidak dapat diproses untuk pembayaran.');
            return;
        }

        return redirect()->route('orders.pay', $this->order->id);
    }

    public function cancelOrder()
    {
        abort_if(!$this->order, 404);

        if ($this->order->status !== 'pending') {
            $this->toast('error', 'Transaksi tidak dapat dibatalkan.');
            return;
        }

        DB::transaction(function () {
            $this->order->update(['status' => 'failed']);

            if ($this->order->booking) {
                $this->order->booking->update(['status' => 'cancelled']);
            }

            if ($this->order->payment) {
                $this->order->payment->update([
                    'payment_status' => 'cancelled',
                    'expired_at' => now(),
                ]);
            }
        });

        $this->toast('success', 'Transaksi berhasil dibatalkan.');

        return redirect()->route('transaction-histories.index');
    }

    public function getStatusBadgeProperty()
    {
        $displayStatus = $this->order->status
            ?? $this->order->payment?->payment_status
            ?? $this->order->booking?->status;

        $statusText = $displayStatus ? ucfirst(str_replace('_', ' ', $displayStatus)) : '-';
        $statusKey = strtolower((string) $displayStatus);

        $badgeClass = 'bg-gray-100 text-gray-700';

        if (in_array($statusKey, ['paid', 'finished'], true)) {
            $badgeClass = 'bg-green-100 text-green-700';
        } elseif (in_array($statusKey, ['pending', 'waiting', 'progress'], true)) {
            $badgeClass = 'bg-yellow-100 text-yellow-800';
        } elseif (in_array($statusKey, ['failed', 'expired', 'cancelled'], true)) {
            $badgeClass = 'bg-red-100 text-red-700';
        }

        return [
            'text' => $statusText,
            'class' => $badgeClass,
            'raw' => $displayStatus
        ];
    }

    public function downloadPdf()
    {
        $pdf = Pdf::loadView('pdf.transaction-receipt', [
            'order' => $this->order
        ]);

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'Invoice-' . $this->order->order_code . '.pdf'
        );
    }

    public function getBookingDurationProperty()
    {
        if (!$this->order->booking || !$this->order->booking->start_time || !$this->order->booking->end_time) {
            return null;
        }

        $start = Carbon::parse($this->order->booking->start_time);
        $end = Carbon::parse($this->order->booking->end_time);

        return $start->diffInHours($end);
    }

    public function render()
    {
        return view('livewire.user.histories.transaction-history-detail', [
            'statusBadge' => $this->statusBadge,
            'bookingDuration' => $this->bookingDuration,
        ]);
    }
}
