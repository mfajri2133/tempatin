<?php

namespace App\Livewire\User;

use App\Models\Order;
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
        Config::$isSanitized = config('services.midtrans.sanitized');
        Config::$is3ds = config('services.midtrans.3ds');

        $params = [
            'transaction_details' => [
                'order_id' => $this->order->order_code,
                'gross_amount' => (int) $this->order->total_amount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'item_details' => [
                [
                    'id' => $this->order->booking->venue->id,
                    'price' => (int) $this->order->booking->venue->price_per_hour,
                    'quantity' => (int) $this->order->booking->total_hours,
                    'name' => $this->order->booking->venue->name,
                ],
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $this->order->update([
            'snap_token' => $snapToken,
        ]);

        $this->dispatch('open-midtrans', token: $snapToken);
    }

    public function render()
    {
        return view('livewire.user.order-payment');
    }
}
