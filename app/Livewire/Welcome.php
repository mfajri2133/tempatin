<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Welcome'])]
class Welcome extends Component
{
    public function render()
    {
        return view('livewire.welcome');
    }
}
