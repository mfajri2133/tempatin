<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Profile'])]
class Profile extends Component
{
    public function render()
    {
        return view('livewire.dashboard.profile');
    }
}
