<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Reset Password'])]
class ResetPassword extends Component
{
    public function render()
    {
        return view('livewire.reset-password');
    }
}
