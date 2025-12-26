<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Reset Password'])]
class ResetPassword extends Component
{
    public string $email = '';
    public string $token = '';
    public string $password = '';
    public string $password_confirmation = '';

    public bool $invalidLink = false;

    public function mount(string $token)
    {
        $this->token = $token;
        $this->email = request()->query('email');

        if (!$this->email) {
            $this->invalidLink = true;
            return;
        }

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            $this->invalidLink = true;
            return;
        }

        $tokenExists = DB::table('password_reset_tokens')
            ->where('email', $this->email)
            ->where('token', $this->token)
            ->exists();

        if (!$tokenExists) {
            $this->invalidLink = true;
            return;
        }
    }


    public function submit()
    {
        if ($this->invalidLink) {
            return;
        }

        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                $user->update([
                    'password' => Hash::make($password),
                ]);
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()
                ->route('login')
                ->with('success', 'Password berhasil direset. Silakan login.');
        }

        $this->invalidLink = true;
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
