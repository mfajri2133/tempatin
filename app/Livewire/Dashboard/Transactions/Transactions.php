<?php

namespace App\Livewire\Dashboard\Transactions;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard', ['title' => 'Transaksi'])]
class Transactions extends Component
{
    use WithPagination;
    public string $search = '';
    public string $status = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function getStatusOptionsProperty(): array
    {
        return [
            'pending',
            'paid',
            'failed',
        ];
    }

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
            ->when(
                $this->status,
                fn($q) =>
                $q->where('status', $this->status)
            )
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('order_code', 'like', '%' . $this->search . '%')
                        ->orWhereHas('user', function ($u) {
                            $u->where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('email', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.transactions.transactions', [
            'transactions' => $transactions,
            'statusOptions' => $this->statusOptions,
        ]);
    }
}
