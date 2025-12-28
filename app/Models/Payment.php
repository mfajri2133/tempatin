<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'invoice_id',
        'snap_token',
        'external_id',
        'payment_status',
        'paid_at',
        'expired_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function isSuccess(): bool
    {
        return in_array($this->payment_status, ['capture', 'settlement']);
    }

    public function isFailed(): bool
    {
        return in_array($this->payment_status, ['deny', 'cancel', 'expire']);
    }
}
