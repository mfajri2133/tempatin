<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Admin'])]
class Admin extends Component
{
    public function render()
    {
        return view('livewire.dashboard.admin');
    }
}
