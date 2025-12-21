<?php

namespace App\Livewire\Dashboard\Venues;

use App\Models\Venue;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Detail Venue'])]
class VenueDetail extends Component
{
    public Venue $venue;

    public function mount(Venue $venue)
    {
        $this->venue = $venue->load('category');
    }

    public function render()
    {
        return view('livewire.dashboard.venues.venue-detail');
    }
}
