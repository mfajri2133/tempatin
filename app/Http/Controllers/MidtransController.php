<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function handle(Request $request)
    {
        $notification = new Notification();

        $order = Order::where('order_code', $notification->order_id)->firstOrFail();

        if ($notification->transaction_status === 'settlement') {
            $order->update(['status' => 'paid']);
            $order->booking->update(['status' => 'progress']);
        }

        if (in_array($notification->transaction_status, ['expire', 'cancel'])) {
            $order->update(['status' => 'expired']);
            $order->booking->update(['status' => 'cancelled']);
        }

        return response()->json(['status' => 'ok']);
    }
}
