<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Pengguna'])]
class Users extends Component
{
    public function render()
    {
        return view('livewire.dashboard.users');
    }
}
