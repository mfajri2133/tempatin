<?php

namespace App\Livewire\User;

use App\Models\Order;
use App\Models\Payment;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        Config::$serverKey    = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized  = config('services.midtrans.sanitized');
        Config::$is3ds        = config('services.midtrans.3ds');

        $params = [
            'transaction_details' => [
                'order_id'     => $this->order->order_code,
                'gross_amount' => (int) $this->order->total_amount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email'      => Auth::user()->email,
            ],
            'expiry' => [
                'start_time' => now()->format('Y-m-d H:i:s O'),
                'unit'       => 'minutes',
                'duration'   => 1,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            Payment::updateOrCreate(
                ['order_id' => $this->order->id],
                [
                    'invoice_id'     => $this->order->order_code,
                    'snap_token'     => $snapToken,
                    'payment_status' => 'pending',
                ]
            );

            $this->dispatch('open-midtrans', token: $snapToken);
        } catch (Exception $e) {
            Log::error('Gagal generate Snap Token', [
                'order_id' => $this->order->id,
                'error' => $e->getMessage()
            ]);

            session()->flash('error', 'Gagal memproses pembayaran. Silakan coba lagi.');
        }
    }

    public function render()
    {
        return view('livewire.user.order-payment');
    }
}
