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
        $this->info('ExpireOrders daemon started');

        while (true) {
            $this->expireOnce();
            sleep(15);
        }
    }

    private function expireOnce()
    {
        $expiredOrders = Order::where('status', 'pending')
            ->whereHas('payment', function ($query) {
                $query->where('payment_status', 'pending')
                    ->where('expired_at', '<', now());
            })
            ->with(['booking', 'payment'])
            ->get();

        foreach ($expiredOrders as $order) {
            DB::transaction(function () use ($order) {
                $order->update(['status' => 'failed']);
                optional($order->booking)->update(['status' => 'cancelled']);
                optional($order->payment)->update(['payment_status' => 'expired']);
            });
        }
    }
}
