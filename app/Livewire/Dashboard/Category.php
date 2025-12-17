<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Kategori'])]
class Category extends Component
{
    public function render()
    {
        return view('livewire.dashboard.category');
    }
}
