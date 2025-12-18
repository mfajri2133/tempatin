<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Pengguna'])]
class Users extends Component
{
    public string $search = '';

    public function render()
    {
        $users = User::query()
            ->where('role', 'user')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->get();

        return view('livewire.dashboard.users', [
            'users' => $users
        ]);
    }
}
