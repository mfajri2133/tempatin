<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'invoice_id',
        'external_id',
        'payment_url',
        'payment_status',
        'paid_at',
        'expired_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
