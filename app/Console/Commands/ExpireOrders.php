<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExpireOrders extends Command
{
    protected $signature = 'orders:expire';
    protected $description = 'Auto expire orders yang melewati batas waktu pembayaran';

    public function handle()
    {
        $expiredOrders = Order::where('status', 'pending')
            ->whereHas('payment', function ($query) {
                $query->where('payment_status', 'pending')
                    ->where('created_at', '<', now()->subMinutes(6));
            })
            ->with(['booking', 'payment'])
            ->get();

        foreach ($expiredOrders as $order) {
            DB::transaction(function () use ($order) {
                $order->update(['status' => 'expired']);

                if ($order->booking) {
                    $order->booking->update(['status' => 'cancelled']);
                }

                $order->payment->update([
                    'payment_status' => 'expire',
                    'expired_at'     => now(),
                ]);
            });

            $this->info("Order {$order->order_code} expired");
        }

        $this->info("Total expired: " . $expiredOrders->count());
    }
}
