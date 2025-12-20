<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'venue_id',
        'parent_booking_id',
        'booking_date',
        'start_time',
        'end_time',
        'total_hours',
        'total_price',
        'booking_code',
        'status',
        'checkin_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function parent()
    {
        return $this->belongsTo(Booking::class, 'parent_booking_id');
    }

    public function children()
    {
        return $this->hasMany(Booking::class, 'parent_booking_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
