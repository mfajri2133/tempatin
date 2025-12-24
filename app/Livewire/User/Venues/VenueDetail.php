<?php

namespace App\Livewire\User\Venues;

use App\Models\Venue;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Detail Tempat'])]
class VenueDetail extends Component
{
    public Venue $venue;
    public string $booking_date = '';
    public string $start_time = '';
    public string $end_time = '';
    public function getTotalHoursProperty()
    {
        if ($this->start_time && $this->end_time) {
            $hours = (strtotime($this->end_time) - strtotime($this->start_time)) / 3600;
            return $hours > 0 ? (int)$hours : 0;
        }
        return 0;
    }

    public function getTotalPriceProperty()
    {
        return $this->total_hours * $this->venue->price_per_hour;
    }

    public function mount(Venue $venue)
    {
        $this->venue = $venue->load('category');
        $this->booking_date = now()->toDateString();
    }

    public function bookNow()
    {
        $this->validate([
            'booking_date' => ['required', 'date', 'after_or_equal:today'],
            'start_time'   => ['required'],
            'end_time'     => ['required', 'after:start_time'],
        ]);

        return redirect()->route('booking.review', [
            'venue'        => $this->venue->id,
            'booking_date' => $this->booking_date,
            'start_time'   => $this->start_time,
            'end_time'     => $this->end_time,
        ]);
    }

    public function render()
    {
        return view('livewire.user.venues.venue-detail');
    }
}
