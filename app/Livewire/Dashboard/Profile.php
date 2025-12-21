<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard', ['title' => 'Profile'])]
class Profile extends Component
{
    use WithFileUploads;
    public $user;
    public $photo;
    public $name;
    public $email;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function saveProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();

        if ($this->photo) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $photoPath = $this->photo->store('avatars', 'public');
            $user->avatar = $photoPath;
        }

        $user->name = $this->name;
        $user->save();

        $this->user = $user;

        session()->flash('success', 'Profil berhasil diperbarui!');
        return redirect()->route('dashboard.profile');
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:8|confirmed',
        ]);

        Auth::user()->update([
            'password' => Hash::make($this->new_password)
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        session()->flash('success', 'Kata sandi berhasil diubah!');
        return redirect()->route('dashboard.profile');
    }

    public function render()
    {
        return view('livewire.dashboard.profile');
    }
}
