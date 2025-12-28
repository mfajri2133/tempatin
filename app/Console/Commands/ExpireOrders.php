<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

class ExpireOrders extends Command
{
    protected $signature = 'orders:expire';
    protected $description = 'Auto expire orders yang melewati batas waktu pembayaran';

    public function handle(): void
    {
        $this->info('ExpireOrders daemon started');

        while (true) {
            try {
                $this->expireOnce();
            } catch (Throwable $e) {
                logger()->error('ExpireOrders daemon error', [
                    'message' => $e->getMessage(),
                ]);
            }
            sleep(5);
        }
    }

    private function expireOnce(): void
    {
        $expiredOrders = Order::query()
            ->where('status', 'pending')
            ->whereHas('payment', function ($query) {
                $query->where('payment_status', 'pending')
                    ->where('expired_at', '<', now());
            })
            ->with(['booking', 'payment'])
            ->orderBy('id')
            ->limit(10)
            ->get();

        if ($expiredOrders->isEmpty()) {
            sleep(10);
            return;
        }

        foreach ($expiredOrders as $order) {
            DB::transaction(function () use ($order) {
                $order->update(['status' => 'failed']);

                optional($order->booking)->update([
                    'status' => 'cancelled',
                ]);

                optional($order->payment)->update([
                    'payment_status' => 'expired',
                ]);
            });
        }
    }
}
