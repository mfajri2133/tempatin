<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Cari Tempat'])]
class Venues extends Component
{
    public function render()
    {
        return view('livewire.user.venues');
    }
}
