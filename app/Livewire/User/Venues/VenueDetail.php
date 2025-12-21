<?php

namespace App\Livewire\User\Venues;

use App\Models\Venue;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Detail Tempat'])]
class VenueDetail extends Component
{
    public Venue $venue;

    public function mount(Venue $venue)
    {
        $this->venue = $venue->load('category');
    }

    public function render()
    {
        return view('livewire.user.venues.venue-detail');
    }
}
