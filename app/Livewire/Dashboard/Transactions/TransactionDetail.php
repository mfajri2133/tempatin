<?php

namespace App\Livewire\Dashboard\Transactions;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Detail Transaksi'])]
class TransactionDetail extends Component
{
    public Order $transaction;

    public function getOrderStatusBadgeProperty()
    {
        return match ($this->transaction->status) {
            'pending' => [
                'text' => 'Menunggu Pembayaran',
                'class' => 'bg-yellow-100 text-yellow-800',
            ],
            'paid' => [
                'text' => 'Dibayar',
                'class' => 'bg-green-100 text-green-700',
            ],
            'failed' => [
                'text' => 'Gagal / Batal',
                'class' => 'bg-red-100 text-red-700',
            ],
            default => [
                'text' => '-',
                'class' => 'bg-gray-100 text-gray-700',
            ],
        };
    }

    public function getBookingStatusBadgeProperty()
    {
        $booking = $this->transaction->booking;

        if (!$booking) {
            return [
                'text' => '-',
                'class' => 'bg-gray-100 text-gray-700',
            ];
        }

        if ($booking->status === 'cancelled') {
            return [
                'text' => 'Dibatalkan',
                'class' => 'bg-red-100 text-red-700',
            ];
        }

        if ($booking->status === 'progress' && $booking->checkin_at) {
            return [
                'text' => 'Selesai',
                'class' => 'bg-green-100 text-green-700',
            ];
        }

        if ($booking->status === 'progress') {
            return [
                'text' => 'Belum Check-in',
                'class' => 'bg-blue-100 text-blue-700',
            ];
        }

        if ($booking->status === 'waiting') {
            return [
                'text' => 'Menunggu Pembayaran',
                'class' => 'bg-yellow-100 text-yellow-800',
            ];
        }

        return [
            'text' => ucfirst($booking->status),
            'class' => 'bg-gray-100 text-gray-700',
        ];
    }


    public function mount(Order $transaction)
    {
        $this->transaction = $transaction->load([
            'user:id,name,email',
            'booking:id,user_id,venue_id,booking_date,start_time,end_time,total_hours,total_price,status,booking_code,checkin_at',
            'booking.venue:id,name,address,city_name,capacity,price_per_hour,category_id',
            'booking.venue.category:id,name',
            'payment:id,order_id,payment_status,invoice_id,external_id,paid_at,expired_at',
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.transactions.transaction-detail', [
            'transaction' => $this->transaction,
            'orderStatusBadge'   => $this->orderStatusBadge,
            'bookingStatusBadge' => $this->bookingStatusBadge,
        ]);
    }
}
