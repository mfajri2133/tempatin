<?php

namespace App\Livewire\Dashboard\Venues;

use App\Models\Venue;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard', ['title' => 'Tempat'])]
class Venues extends Component
{
    use WithPagination;
    public string $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
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
        $venues = Venue::select(
            'id',
            'name',
            'address',
            'capacity',
            'price_per_hour',
            'status'
        )
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('city', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.venues.venues', compact('venues'));
    }
}
