<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard', ['title' => 'Profile'])]
class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $photo;
    public $currentPhoto;

    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->currentPhoto = $user->avatar;
    }

    public function saveProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();

        if ($this->photo) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $this->photo->store('avatars', 'public');
            $user->avatar = $path;
            $this->currentPhoto = $path;
        }

        $user->update([
            'name' => $this->name,
            'avatar' => $user->avatar,
        ]);

        session()->flash('success', 'Profil berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.dashboard.profile');
    }
}
