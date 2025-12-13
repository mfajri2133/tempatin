<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Set Password'])]
class SetPassword extends Component
{
    public $name;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->name = auth()->user()->name;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = auth()->user();
        $user->name = $this->name;
        $user->password = bcrypt($this->password);
        $user->save();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.set-password');
    }
}
