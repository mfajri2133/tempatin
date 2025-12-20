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
        $transactions = Order::select([
            'id',
            'order_code',
            'user_id',
            'booking_id',
            'total_amount',
            'status',
            'created_at',
        ])
            ->with([
                'user:id,name,email',
                'booking.venue:id,name',
                'payment:id,order_id,payment_status',
            ])
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.transactions', compact('transactions'));
    }
}
