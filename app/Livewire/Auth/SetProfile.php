<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.blank', ['title' => 'Set Password'])]
class SetProfile extends Component
{
    public $name;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $user = auth()->user();

        if ($user->password !== null) {
            return redirect()->route('welcome');
        }

        $this->name = $user->name;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = auth()->user();
        $user->name = $this->name;
        $user->password = bcrypt($this->password);
        $user->save();
        session()->regenerate();

        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.auth.set-profile');
    }
}
