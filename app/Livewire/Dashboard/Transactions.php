<?php

namespace App\Livewire\Dashboard;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Transaksi'])]
class Transactions extends Component
{
    public function render()
    {
        $transactions = Order::with([
            'user:id,name,email',
            'booking.venue:id,name',
            'payment',
        ])
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.transactions', compact('transactions'));
    }
}
