<?php

namespace App\Livewire\Dashboard\Venues;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Tempat'])]
class VenueCreate extends Component
{
    public function render()
    {
        return view('livewire.dashboard.venues.venue-create');
    }
}
