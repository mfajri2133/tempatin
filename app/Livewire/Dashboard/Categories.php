<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Kategori'])]

class Categories extends Component
{
    public function render()
    {
        return view('livewire.dashboard.categories');
    }
}
