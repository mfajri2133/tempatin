<?php

namespace App\Livewire;

use App\Models\Mail;
use App\Traits\WithToast;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Contact'])]
class Contact extends Component
{
    use WithToast;
    public string $name = '';
    public string $email = '';
    public string $message = '';

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:5',
        ]);

        Mail::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->toast('success', 'Pesan Anda telah terkirim! Kami akan menghubungi Anda segera.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
