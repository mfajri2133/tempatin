<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('🔔 Midtrans Callback RAW', $request->all());

        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');

        try {
            $notification = new Notification();

            $orderCode = $notification->order_id;
            $transactionStatus = $notification->transaction_status;
            $transactionId = $notification->transaction_id;

            Log::info('📦 Midtrans Parsed', [
                'order_id' => $orderCode,
                'status' => $transactionStatus,
            ]);

            $order = Order::where('order_code', $orderCode)->firstOrFail();

            // ⬇️ Mapping FINAL
            $isPaid = in_array($transactionStatus, ['capture', 'settlement']);

            Payment::updateOrCreate(
                ['order_id' => $order->id],
                [
                    'invoice_id'     => $order->order_code,
                    'external_id'    => $transactionId,
                    'payment_status' => $isPaid ? 'paid' : $transactionStatus,
                    'paid_at'        => $isPaid ? now() : null,
                ]
            );

            if ($isPaid) {
                $order->update(['status' => 'paid']);
                $order->booking->update(['status' => 'progress']);
            }

            if (in_array($transactionStatus, ['expire', 'cancel', 'deny'])) {
                $order->update(['status' => 'expired']);
                $order->booking->update(['status' => 'cancelled']);
            }

            return response()->json(['status' => 'ok'], 200);
        } catch (\Exception $e) {
            Log::error('💥 Midtrans Callback ERROR', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
