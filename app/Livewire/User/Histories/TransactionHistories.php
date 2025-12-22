<?php

namespace App\Livewire\User\Histories;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app', ['title' => 'Histori Transaksi'])]
class TransactionHistories extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function getStatusBadge($order)
    {
        $orderStatus = $order->status;
        $bookingStatus = $order->booking?->status;
        $paymentStatus = $order->payment?->payment_status;

        if ($paymentStatus) {
            $displayStatus = $paymentStatus;
        } elseif ($bookingStatus) {
            $displayStatus = $bookingStatus;
        } else {
            $displayStatus = $orderStatus;
        }

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
            'key' => $statusKey
        ];
    }

    public function getBookingInfo($order)
    {
        $bookingCode = $order->booking?->booking_code ?? ($order->order_code ?? '-');
        $venueName = $order->booking?->venue?->name;
        $venueCity = $order->booking?->venue?->city;
        $venueText = $venueName ? trim($venueName . ($venueCity ? ' · ' . $venueCity : '')) : '-';

        $bookingDate = $order->booking?->booking_date
            ? Carbon::parse($order->booking->booking_date)->format('d M Y')
            : '-';

        $bookingTime = '';
        if ($order->booking?->start_time && $order->booking?->end_time) {
            $bookingTime = substr($order->booking->start_time, 0, 5) . ' - ' . substr($order->booking->end_time, 0, 5);
        }

        return [
            'code' => $bookingCode,
            'venue' => $venueText,
            'date' => $bookingDate,
            'time' => $bookingTime,
        ];
    }

    public function render()
    {
        $orders = Order::with([
            'booking.venue:id,name,city_name',
            'booking:id,venue_id,booking_code,booking_date,start_time,end_time,total_price,status',
            'payment:id,order_id,payment_status',
        ])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('livewire.user.histories.transaction-histories', [
            'orders' => $orders,
        ]);
    }
}
