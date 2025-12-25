<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Lupa Password'])]
class ForgotPassword extends Component
{
    public string $email = '';

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink([
            'email' => $this->email,
        ]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash(
                'success',
                __('Link reset password telah dikirim ke email Anda.')
            );
        } else {
            session()->flash(
                'error',
                __('Gagal mengirim link reset password.')
            );
        }
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
