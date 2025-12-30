<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Pemindai QR'])]
class QRScanner extends Component
{
    public function render()
    {
        return view('livewire.dashboard.q-r-scanner');
    }
}
