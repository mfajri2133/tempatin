<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Profile'])]

class Profile extends Component
{
    public function render()
    {
        return view('livewire.dashboard.profile');
    }
}
