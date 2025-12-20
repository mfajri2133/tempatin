<?php

namespace App\Livewire\Dashboard\Venues;

use App\Models\Venue;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Tempat'])]
class Venues extends Component
{
    public string $search = '';

    public ?int $venueId = null;

    public function confirmDelete($venueId)
    {
        $this->venueId = $venueId;
        $this->dispatch('open-delete-modal');
    }

    public function toggleStatus($venueId)
    {
        $venue = Venue::findOrFail($venueId);

        $venue->update([
            'status' => $venue->status === 'available'
                ? 'unavailable'
                : 'available',
        ]);
    }

    public function render()
    {
        $venues = Venue::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('city', 'like', "%{$this->search}%");
            })
            ->latest()
            ->get();

        return view('livewire.dashboard.venues.venues', compact('venues'));
    }
}
