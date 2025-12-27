<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Faq'])]
class Faq extends Component
{
    public function render()
    {
        return view('livewire.faq');
    }
}
