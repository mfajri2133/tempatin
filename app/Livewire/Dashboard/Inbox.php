<?php

namespace App\Livewire\Dashboard;

use App\Models\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard', ['title' => 'Kotak Masuk'])]
class Inbox extends Component
{
    use WithPagination;
    public string $search = '';
    public function render()
    {
        $inboxes = Mail::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.inbox', compact('inboxes'));
    }
}
