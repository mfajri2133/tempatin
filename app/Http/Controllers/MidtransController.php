<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function handle(Request $request)
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');

        try {
            $notification = new Notification();

            $orderCode = $notification->order_id;
            $transactionStatus = $notification->transaction_status;
            $transactionId = $notification->transaction_id;

            $order = Order::where('order_code', $orderCode)
                ->with(['booking', 'payment'])
                ->lockForUpdate()
                ->firstOrFail();

            DB::transaction(function () use ($order, $transactionStatus, $transactionId) {
                $isPaid = in_array($transactionStatus, ['capture', 'settlement']);
                $isFailed = in_array($transactionStatus, ['deny', 'cancel']);
                $isExpired = $transactionStatus === 'expire';

                Payment::updateOrCreate(
                    ['order_id' => $order->id],
                    [
                        'invoice_id'     => $order->order_code,
                        'external_id'    => $transactionId,
                        'payment_status' => $transactionStatus,
                        'paid_at'        => $isPaid ? now() : null,
                        'expired_at' => $isExpired
                            ? ($notification->expiry_time ?? now())
                            : $order->payment?->expired_at,
                    ]
                );

                if ($isPaid) {
                    $order->update(['status' => 'paid']);
                    $order->booking->update(['status' => 'progress']);
                }

                if ($isFailed) {
                    $order->update(['status' => 'failed']);
                    $order->booking->update(['status' => 'cancelled']);
                }

                if ($isExpired) {
                    $order->update(['status' => 'expired']);
                    $order->booking->update(['status' => 'cancelled']);
                }
            });

            return response()->json(['status' => 'ok'], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
