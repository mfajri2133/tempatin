<?php

namespace App\Livewire;

use App\Models\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['title' => 'Contact'])]
class Contact extends Component
{
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

        session()->flash('success', 'Pesan Anda telah terkirim. Terima kasih!');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
