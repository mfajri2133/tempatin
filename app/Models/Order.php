<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'booking_id',
        'order_code',
        'total_amount',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($order) {
            if (!$order->order_code) {
                $order->order_code = self::generateOrderCode();
            }
        });
    }

    private static function generateOrderCode(): string
    {
        return 'ORD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5));
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
