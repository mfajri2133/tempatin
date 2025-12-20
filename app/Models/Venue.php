<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'address',
        'city',
        'province',
        'capacity',
        'price_per_hour',
        'status',
        'venue_img',
    ];

    protected $casts = [
        'price_per_hour' => 'decimal:2',
        'capacity' => 'integer',
    ];

    public function getPriceFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->price_per_hour, 0, ',', '.');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
