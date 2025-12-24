<?php

namespace App\Livewire\User\Venues;

use App\Models\Venue;
use App\Models\Booking;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Detail Tempat'])]
class VenueDetail extends Component
{
    public Venue $venue;
    public string $booking_date = '';
    public string $start_time = '';
    public string $end_time = '';
    public int $total_hours = 0;
    public int $total_price = 0;
    public bool $show_availability = false;

    public function calculatePrice()
    {
        if ($this->start_time && $this->end_time) {
            $start = strtotime($this->start_time);
            $end = strtotime($this->end_time);
            $hours = ($end - $start) / 3600;

            if ($hours > 0) {
                $this->total_hours = (int)$hours;
                $this->total_price = $hours * $this->venue->price_per_hour;
            } else {
                $this->total_hours = 0;
                $this->total_price = 0;
            }
        } else {
            $this->total_hours = 0;
            $this->total_price = 0;
        }
    }

    public function updated($property)
    {
        if (in_array($property, ['start_time', 'end_time'])) {
            $this->calculatePrice();
        }

        if ($property === 'booking_date') {
            $this->show_availability = false;
            $this->start_time = '';
            $this->end_time = '';
        }

        if ($property === 'start_time') {
            $this->end_time = '';
        }
    }

    public function toggleAvailability()
    {
        if (!$this->booking_date) {
            session()->flash('error', 'Pilih tanggal terlebih dahulu');
            return;
        }

        $this->show_availability = !$this->show_availability;
    }

    public function getAvailableHoursProperty()
    {
        if (!$this->booking_date) {
            return [];
        }

        $bookings = Booking::where('venue_id', $this->venue->id)
            ->where('booking_date', $this->booking_date)
            ->whereIn('status', ['pending', 'confirmed'])
            ->get();

        $bookedHours = [];
        foreach ($bookings as $booking) {
            $start = (int)substr($booking->start_time, 0, 2);
            $end = (int)substr($booking->end_time, 0, 2);

            for ($i = $start; $i < $end; $i++) {
                $bookedHours[] = $i;
            }
        }

        $availableHours = [];
        for ($i = 6; $i <= 22; $i++) {
            $availableHours[] = [
                'hour' => $i,
                'time' => sprintf('%02d:00', $i),
                'is_booked' => in_array($i, $bookedHours)
            ];
        }

        return $availableHours;
    }

    public function getEndTimeOptionsProperty()
    {
        if (!$this->start_time) {
            return [];
        }

        $startHour = (int)substr($this->start_time, 0, 2);
        $options = [];

        for ($i = $startHour + 1; $i <= 22; $i++) {
            $options[] = [
                'value' => sprintf('%02d:00', $i),
                'label' => sprintf('%02d:00', $i)
            ];
        }

        return $options;
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
