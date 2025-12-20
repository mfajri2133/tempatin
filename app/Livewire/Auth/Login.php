<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Login'])]
class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            $this->addError('email', 'Email atau password salah.');
            return;
        }

        session()->regenerate();

        $user = Auth::user();

        if (session()->has('url.intended')) {
            return redirect()->intended();
        }

        if ($user->role === 'admin') {
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('welcome');
    }
}
