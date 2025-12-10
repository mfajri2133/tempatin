<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('app', ['title' => 'Login'])]
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

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->addError('email', 'Email atau password salah.');
            return;
        }

        session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->to('/dashboard');
        }

        return redirect()->to('/');
    }
}
