<?php

namespace App\Livewire\User\Histories;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

#[Layout('layouts.app', ['title' => 'Detail Histori Transaksi'])]
class TransactionHistoryDetail extends Component
{
    public $orderId;
    public $order;

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
            session()->flash('error', 'Transaksi tidak dapat dibayar.');
            return;
        }

        return redirect()->route('orders.pay', $this->order->id);
    }

    public function cancelOrder()
    {
        abort_if(!$this->order, 404);

        if ($this->order->status !== 'pending') {
            session()->flash('error', 'Transaksi tidak dapat dibatalkan.');
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

        session()->flash('success', 'Transaksi berhasil dibatalkan.');

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

    public function getTimelineStepsProperty()
    {
        $steps = [];
        $currentStatus = strtolower($this->order->status ?? '');
        $bookingStatus = strtolower($this->order->booking?->status ?? '');
        $paymentStatus = strtolower($this->order->payment?->payment_status ?? '');

        $steps[] = [
            'label' => 'Order Dibuat',
            'description' => $this->order->created_at->format('d M Y, H:i'),
            'status' => 'completed',
            'icon' => 'receipt'
        ];

        if ($paymentStatus === 'paid' || $currentStatus === 'paid') {
            $steps[] = [
                'label' => 'Pembayaran Berhasil',
                'description' => $this->order->payment?->paid_at
                    ? Carbon::parse($this->order->payment->paid_at)->format('d M Y, H:i')
                    : '-',
                'status' => 'completed',
                'icon' => 'check-circle'
            ];
        } elseif ($currentStatus === 'pending') {
            $expiredAt = $this->order->payment?->expired_at
                ? Carbon::parse($this->order->payment->expired_at)->format('d M Y, H:i')
                : null;

            $steps[] = [
                'label' => 'Menunggu Pembayaran',
                'description' => $expiredAt ? "Bayar sebelum: {$expiredAt}" : 'Segera lakukan pembayaran',
                'status' => 'current',
                'icon' => 'clock'
            ];
        } elseif (in_array($currentStatus, ['expired', 'failed'], true)) {
            $steps[] = [
                'label' => ucfirst($currentStatus),
                'description' => $currentStatus === 'expired' ? 'Waktu pembayaran habis' : 'Pembayaran gagal',
                'status' => 'failed',
                'icon' => 'x-circle'
            ];
        }

        if ($this->order->booking) {
            if ($bookingStatus === 'waiting' && ($currentStatus === 'paid' || $paymentStatus === 'paid')) {
                $bookingDate = $this->order->booking->booking_date
                    ? Carbon::parse($this->order->booking->booking_date)->format('d M Y')
                    : '-';
                $startTime = $this->order->booking->start_time
                    ? substr($this->order->booking->start_time, 0, 5)
                    : '-';

                $steps[] = [
                    'label' => 'Menunggu Jadwal',
                    'description' => "Booking: {$bookingDate} · {$startTime}",
                    'status' => 'current',
                    'icon' => 'calendar'
                ];
            } elseif ($bookingStatus === 'progress') {
                $steps[] = [
                    'label' => 'Sedang Berlangsung',
                    'description' => 'Booking sedang berlangsung',
                    'status' => 'current',
                    'icon' => 'play'
                ];
            } elseif ($bookingStatus === 'finished') {
                $checkinAt = $this->order->booking->checkin_at
                    ? Carbon::parse($this->order->booking->checkin_at)->format('d M Y, H:i')
                    : null;

                $steps[] = [
                    'label' => 'Selesai',
                    'description' => $checkinAt ? "Check-in: {$checkinAt}" : 'Booking telah selesai',
                    'status' => 'completed',
                    'icon' => 'check-circle'
                ];
            } elseif ($bookingStatus === 'cancelled') {
                $steps[] = [
                    'label' => 'Dibatalkan',
                    'description' => 'Booking telah dibatalkan',
                    'status' => 'failed',
                    'icon' => 'x-circle'
                ];
            }
        }

        return $steps;
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
            'timelineSteps' => $this->timelineSteps,
            'bookingDuration' => $this->bookingDuration,
        ]);
    }
}
