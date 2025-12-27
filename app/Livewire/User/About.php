<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'About'])]
class About extends Component
{
    public function render()
    {
        return view('livewire.about');
    }
}
