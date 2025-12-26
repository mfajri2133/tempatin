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

        // Hanya cek booking yang masih aktif (bukan cancelled atau finished)
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
            $availableHours[] = [
                'hour'      => $hour,
                'time'      => sprintf('%02d:00', $hour),
                'is_booked' => in_array($hour, $bookedHours),
            ];
        }

        return $availableHours;
    }

    public function getStartTimeOptionsProperty()
    {
        if (!$this->booking_date) {
            return [];
        }

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
            $isBooked = in_array($hour, $bookedHours);

            $options[] = [
                'value' => sprintf('%02d:00', $hour),
                'label' => sprintf('%02d:00', $hour),
                'disabled' => $isBooked
            ];
        }

        return $options;
    }

    public function getEndTimeOptionsProperty()
    {
        if (!$this->start_time) {
            return [];
        }

        $startHour = (int)substr($this->start_time, 0, 2);

        $bookings = Booking::where('venue_id', $this->venue->id)
            ->where('booking_date', $this->booking_date)
            ->whereIn('status', ['waiting', 'progress'])
            ->get(['start_time', 'end_time']);

        $maxEndHour = 23; // Default maksimal jam 23:00

        foreach ($bookings as $booking) {
            $bookingStartHour = (int) substr($booking->start_time, 0, 2);
            $bookingEndHour   = (int) substr($booking->end_time, 0, 2);

            // Jika ada booking yang dimulai setelah start_time kita
            // Maka end_time maksimal adalah saat booking tersebut dimulai
            if ($bookingStartHour > $startHour && $bookingStartHour < $maxEndHour) {
                $maxEndHour = $bookingStartHour;
            }

            // Safety check
            if ($startHour >= $bookingStartHour && $startHour < $bookingEndHour) {
                return [];
            }
        }

        $options = [];
        for ($hour = $startHour + 1; $hour <= $maxEndHour; $hour++) {
            $options[] = [
                'value' => sprintf('%02d:00', $hour),
                'label' => sprintf('%02d:00', $hour)
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

        // Double check availability
        $conflict = Booking::where('venue_id', $this->venue->id)
            ->where('booking_date', $this->booking_date)
            ->whereIn('status', ['waiting', 'progress'])
            ->where(function ($q) {
                $q->where('start_time', '<', $this->end_time)
                    ->where('end_time', '>', $this->start_time);
            })
            ->exists();

        if ($conflict) {
            session()->flash('error', 'Jadwal sudah dibooking oleh pengguna lain');
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
