<?php

namespace App\Livewire\User;

use App\Models\Booking;
use App\Models\Order;
use App\Models\Venue;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Review Booking'])]
class BookingReviews extends Component
{
    public Venue $venue;

    public string $booking_date;
    public string $start_time;
    public string $end_time;

    public int $total_hours = 0;
    public int $total_price = 0;

    public function mount()
    {
        $this->venue = Venue::findOrFail(request('venue'));

        $this->booking_date = request('booking_date');
        $this->start_time   = request('start_time');
        $this->end_time     = request('end_time');

        $this->total_hours = (
            strtotime($this->end_time) - strtotime($this->start_time)
        ) / 3600;

        if ($this->total_hours <= 0) {
            abort(400, 'Jam booking tidak valid');
        }

        $this->total_price = $this->total_hours * $this->venue->price_per_hour;

        $this->checkAvailability();
    }

    protected function checkAvailability()
    {
        $conflict = Booking::where('venue_id', $this->venue->id)
            ->where('booking_date', $this->booking_date)
            ->whereIn('status', ['waiting', 'progress'])
            ->where(function ($q) {
                $q->where('start_time', '<', $this->end_time)
                    ->where('end_time', '>', $this->start_time);
            })
            ->exists();

        if ($conflict) {
            abort(409, 'Jadwal sudah dibooking');
        }
    }

    public function confirmBooking()
    {
        $booking = Booking::create([
            'user_id'      => auth()->id(),
            'venue_id'     => $this->venue->id,
            'booking_date' => $this->booking_date,
            'start_time'   => $this->start_time,
            'end_time'     => $this->end_time,
            'total_hours'  => $this->total_hours,
            'total_price'  => $this->total_price,
            'status'       => 'waiting',
            'booking_code' => 'BK-' . strtoupper(uniqid()),
        ]);

        $order = Order::create([
            'user_id'     => auth()->id(),
            'booking_id'  => $booking->id,
            'order_code'  => 'ORD-' . strtoupper(uniqid()),
            'total_amount' => $this->total_price,
            'status'      => 'pending',
        ]);

        return redirect()->route('orders.pay', $order);
    }

    public function render()
    {
        return view('livewire.user.booking-reviews');
    }
}
