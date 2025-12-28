<?php

namespace App\Livewire\User;

use App\Models\Order;
use App\Models\Payment;
use App\Traits\WithToast;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Midtrans\Snap;
use Midtrans\Config;

#[Layout('layouts.app', ['title' => 'Pembayaran'])]
class OrderPayment extends Component
{
    use WithToast;
    public Order $order;
    public $isExpired = false;

    public function mount(Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);
        abort_if($order->status !== 'pending', 403);

        $this->order = $order->load('booking.venue', 'payment');

        $this->checkExpiration();
    }

    public function checkExpiration()
    {
        if (!$this->order->payment) {
            $this->isExpired = false;
            return;
        }

        if (in_array($this->order->payment->payment_status, ['capture', 'settlement'])) {
            $this->isExpired = false;
            return;
        }

        if (
            $this->order->payment->payment_status === 'pending' &&
            $this->order->payment->expired_at &&
            now()->greaterThan($this->order->payment->expired_at)
        ) {
            $this->isExpired = true;
            return;
        }

        $this->isExpired = false;
    }


    public function pay()
    {
        $this->checkExpiration();

        if (
            $this->order->payment &&
            $this->order->payment->snap_token &&
            !$this->isExpired
        ) {
            $this->dispatch('open-midtrans', token: $this->order->payment->snap_token);
            return;
        }

        if ($this->isExpired) {
            $this->toast('error', 'Waktu pembayaran telah habis.');
            return;
        }

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
                'duration'   => 2,
            ],
            'callbacks' => [
                'finish' => route('transactions.result', ['order_id' => $this->order->order_code]),
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
                    'expired_at'     => now()->addMinutes(2),
                ]
            );

            $this->dispatch('open-midtrans', token: $snapToken);
        } catch (Exception $e) {
            $this->toast('error', 'Gagal memproses pembayaran. Silakan coba lagi.');
        }
    }

    public function cancelPayment()
    {
        try {
            DB::transaction(function () {
                $this->order->update(['status' => 'failed']);

                $this->order->booking->update(['status' => 'cancelled']);

                if ($this->order->payment) {
                    $this->order->payment->update([
                        'payment_status' => 'cancelled',
                        'expired_at' => now()
                    ]);
                }
            });

            $this->toast('success', 'Pembayaran berhasil dibatalkan.');

            return redirect()->route('transaction-histories.index');
        } catch (Exception $e) {
            $this->toast('error', 'Gagal membatalkan pembayaran. Silakan coba lagi.');
        }
    }

    public function render()
    {
        return view('livewire.user.order-payment');
    }
}
