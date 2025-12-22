<?php

namespace App\Livewire\User\Histories;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app', ['title' => 'Histori Transaksi'])]
class TransactionHistories extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $orders = Order::with([
            'booking.venue:id,name,city_name',
            'payment:id,order_id,payment_status',
        ])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('livewire.user.histories.transaction-histories', [
            'orders' => $orders,
        ]);
    }
}
