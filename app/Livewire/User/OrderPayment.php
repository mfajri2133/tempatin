<?php

namespace App\Livewire\User;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Midtrans\Snap;
use Midtrans\Config;

#[Layout('layouts.app', ['title' => 'Pembayaran'])]
class OrderPayment extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);
        abort_if($order->status !== 'pending', 403);

        $this->order = $order->load('booking.venue');
    }

    public function pay()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $this->order->order_code,
                'gross_amount' => (int) $this->order->total_amount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        Payment::updateOrCreate(
            ['order_id' => $this->order->id],
            [
                'snap_token'     => $snapToken,
                'payment_status' => 'pending',
            ]
        );

        $this->dispatch('open-midtrans', token: $snapToken);
    }

    public function render()
    {
        return view('livewire.user.order-payment');
    }
}
