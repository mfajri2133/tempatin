<?php

namespace App\Livewire\User\Venues;

use App\Models\Venue;
use App\Models\Booking;
use App\Traits\WithToast;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Detail Tempat'])]
class VenueDetail extends Component
{
    use WithToast;
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
            $this->calculatePrice();
        }

        if ($property === 'start_time') {
            $this->end_time = '';
            $this->calculatePrice();
        }
    }

    public function toggleAvailability()
    {
        if (!$this->booking_date) {
            $this->toast('error', 'Silakan pilih tanggal booking terlebih dahulu.');
            return;
        }

        $this->show_availability = !$this->show_availability;
    }

    private function currentHourIfToday(): ?int
    {
        if ($this->booking_date === now()->toDateString()) {
            return now()->hour;
        }

        return null;
    }

    public function getAvailableHoursProperty()
    {
        if (!$this->booking_date) {
            return [];
        }

        $currentHour = $this->currentHourIfToday();

        $bookings = Booking::where('venue_id', $this->venue->id)
            ->where('booking_date', $this->booking_date)
            ->whereIn('status', ['waiting', 'progress'])
            ->get(['start_time', 'end_time']);

        $bookedHours = [];

        foreach ($bookings as $booking) {
            $start = (int) substr($booking->start_time, 0, 2);
            $end   = (int) substr($booking->end_time, 0, 2);

            for ($hour = $start; $hour < $end; $hour++) {
                $bookedHours[] = $hour;
            }
        }

        $bookedHours = array_unique($bookedHours);

        $availableHours = [];

        for ($hour = 6; $hour <= 22; $hour++) {
            $isPast = $currentHour !== null && $hour <= $currentHour;

            $availableHours[] = [
                'hour'      => $hour,
                'time'      => sprintf('%02d:00', $hour),
                'is_booked' => in_array($hour, $bookedHours) || $isPast,
            ];
        }

        return $availableHours;
    }

    public function getStartTimeOptionsProperty()
    {
        if (!$this->booking_date) {
            return [];
        }

        $currentHour = $this->currentHourIfToday();

        $bookings = Booking::where('venue_id', $this->venue->id)
            ->where('booking_date', $this->booking_date)
            ->whereIn('status', ['waiting', 'progress'])
            ->get(['start_time', 'end_time']);

        $bookedHours = [];

        foreach ($bookings as $booking) {
            $start = (int) substr($booking->start_time, 0, 2);
            $end   = (int) substr($booking->end_time, 0, 2);

            for ($hour = $start; $hour < $end; $hour++) {
                $bookedHours[] = $hour;
            }
        }

        $options = [];

        for ($hour = 6; $hour <= 22; $hour++) {
            $isPast = $currentHour !== null && $hour <= $currentHour;
            $isBooked = in_array($hour, $bookedHours);

            $options[] = [
                'value'    => sprintf('%02d:00', $hour),
                'label'    => sprintf('%02d:00', $hour),
                'disabled' => $isBooked || $isPast,
            ];
        }

        return $options;
    }

    public function getEndTimeOptionsProperty()
    {
        if (!$this->start_time) {
            return [];
        }

        $startHour   = (int) substr($this->start_time, 0, 2);
        $currentHour = $this->currentHourIfToday();

        $minEndHour = max($startHour + 1, ($currentHour ?? 0) + 1);

        $bookings = Booking::where('venue_id', $this->venue->id)
            ->where('booking_date', $this->booking_date)
            ->whereIn('status', ['waiting', 'progress'])
            ->get(['start_time', 'end_time']);

        $maxEndHour = 23;

        foreach ($bookings as $booking) {
            $bookingStart = (int) substr($booking->start_time, 0, 2);
            $bookingEnd   = (int) substr($booking->end_time, 0, 2);

            if ($bookingStart > $startHour && $bookingStart < $maxEndHour) {
                $maxEndHour = $bookingStart;
            }

            if ($startHour >= $bookingStart && $startHour < $bookingEnd) {
                return [];
            }
        }

        $options = [];

        for ($hour = $minEndHour; $hour <= $maxEndHour; $hour++) {
            $options[] = [
                'value' => sprintf('%02d:00', $hour),
                'label' => sprintf('%02d:00', $hour),
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

        $conflict = Booking::where('venue_id', $this->venue->id)
            ->where('booking_date', $this->booking_date)
            ->whereIn('status', ['waiting', 'progress'])
            ->where(function ($q) {
                $q->where('start_time', '<', $this->end_time)
                    ->where('end_time', '>', $this->start_time);
            })
            ->exists();

        if ($conflict) {
            $this->toast('error', 'Waktu yang Anda pilih bertabrakan dengan booking yang sudah ada. Silakan pilih waktu lain.');
            $this->start_time = '';
            $this->end_time = '';
            $this->calculatePrice();
            return;
        }

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
