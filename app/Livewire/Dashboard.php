<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Dashboard'])]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
