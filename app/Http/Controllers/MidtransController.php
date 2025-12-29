<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Midtrans\Config;
use Midtrans\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MidtransController extends Controller
{

    private function generateBookingQrIfNeeded(Order $order): void
    {
        $booking = $order->booking;

        // idempotent guard
        if ($booking->qr_img) {
            return;
        }

        $payload = [
            'booking_code' => $booking->booking_code ?? $order->order_code,
            'order_code'   => $order->order_code,
            'user_id'      => $order->user_id,
            'venue_id'     => $booking->venue_id,
        ];

        $qrImage = QrCode::format('png')
            ->size(300)
            ->margin(2)
            ->generate(json_encode($payload));

        $path = 'qrcodes/bookings/' . $order->order_code . '.png';

        Storage::disk('public')->put($path, $qrImage);

        $booking->update([
            'qr_img' => $path,
            'qr_generated_at' => now(),
        ]);

        Log::info('BOOKING QR GENERATED', [
            'order_code' => $order->order_code,
            'booking_id' => $booking->id,
        ]);
    }

    public function handle(Request $request)
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');

        try {
            $notification = new Notification();

            $transactionStatus = $notification->transaction_status;
            $fraudStatus = $notification->fraud_status ?? null;
            $paymentType = $notification->payment_type;
            $orderCode = $notification->order_id;
            $transactionId = $notification->transaction_id;

            Log::info('MIDTRANS NOTIFICATION', [
                'order_id' => $orderCode,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
                'payment_type' => $paymentType,
                'transaction_id' => $transactionId,
            ]);

            $order = Order::where('order_code', $orderCode)
                ->with(['booking', 'payment'])
                ->lockForUpdate()
                ->firstOrFail();

            DB::transaction(function () use ($order, $notification, $transactionStatus, $fraudStatus, $paymentType, $transactionId) {

                $paymentStatus = $this->determinePaymentStatus(
                    $transactionStatus,
                    $fraudStatus,
                    $paymentType
                );

                Payment::updateOrCreate(
                    ['order_id' => $order->id],
                    [
                        'invoice_id'     => $order->order_code,
                        'external_id'    => $transactionId,
                        'payment_status' => $paymentStatus['status'],
                        'payment_type'   => $paymentType,
                        'paid_at'        => $paymentStatus['is_paid'] ? now() : null,
                        'expired_at'     => $paymentStatus['is_expired'] ? now() : $order->payment?->expired_at,
                    ]
                );

                $this->updateOrderStatus($order, $paymentStatus);
            });

            return response()->json(['status' => 'success'], 200);
        } catch (Exception $e) {
            Log::error('MIDTRANS NOTIFICATION ERROR', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Internal server error',
            ], 500);
        }
    }

    private function determinePaymentStatus(string $transactionStatus, ?string $fraudStatus, string $paymentType): array
    {
        $result = [
            'status' => $transactionStatus,
            'is_paid' => false,
            'is_failed' => false,
            'is_expired' => false,
        ];

        switch ($transactionStatus) {
            case 'capture':
                if ($paymentType === 'credit_card') {
                    if ($fraudStatus === 'accept') {
                        $result['is_paid'] = true;
                        $result['status'] = 'capture';
                        Log::info("Transaction captured successfully (fraud: accept)");
                    } else if ($fraudStatus === 'challenge') {
                        $result['status'] = 'challenge';
                        Log::warning("Transaction challenged by fraud detection");
                    } else {
                        $result['is_failed'] = true;
                        $result['status'] = 'deny';
                        Log::warning("Transaction denied by fraud detection");
                    }
                } else {
                    $result['is_paid'] = true;
                }
                break;

            case 'settlement':
                $result['is_paid'] = true;
                Log::info("Transaction settled successfully");
                break;

            case 'pending':
                Log::info("Transaction pending - waiting for customer");
                break;

            case 'deny':
                $result['is_failed'] = true;
                Log::warning("Transaction denied");
                break;

            case 'expire':
                $result['is_expired'] = true;
                Log::info("Transaction expired");
                break;

            case 'cancel':
                $result['is_failed'] = true;
                Log::info("Transaction cancelled");
                break;

            default:
                Log::warning("Unknown transaction status: {$transactionStatus}");
                break;
        }

        return $result;
    }

    private function updateOrderStatus(Order $order, array $paymentStatus): void
    {
        if ($paymentStatus['is_paid']) {
            $order->update(['status' => 'paid']);
            $order->booking->update(['status' => 'progress']);
            $this->generateBookingQrIfNeeded($order);
            Log::info("Order marked as paid", ['order_code' => $order->order_code]);
        } else if ($paymentStatus['is_failed']) {
            $order->update(['status' => 'failed']);
            $order->booking->update(['status' => 'cancelled']);
            Log::info("Order marked as failed", ['order_code' => $order->order_code]);
        } else if ($paymentStatus['is_expired']) {
            $order->update(['status' => 'expired']);
            $order->booking->update(['status' => 'cancelled']);
            Log::info("Order marked as expired", ['order_code' => $order->order_code]);
        }
    }
}
