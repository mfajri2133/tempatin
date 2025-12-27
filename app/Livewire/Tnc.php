<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Terms and Conditions'])]
class Tnc extends Component
{
    public function render()
    {
        return view('livewire.tnc');
    }
}