<?php

namespace App\Livewire\User;

use App\Models\Venue;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app', ['title' => 'Cari Tempat'])]
class Venues extends Component
{
    use WithPagination;

    public string $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $venues = Venue::query()
            ->where('status', 'available')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('city', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(9);

        return view('livewire.user.venues', compact('venues'));
    }
}