<?php

namespace App\Livewire\Dashboard\Transactions;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Detail Transaksi'])]
class TransactionDetail extends Component
{
    public Order $transaction;

    public function mount(Order $transaction)
    {
        $this->transaction = $transaction->load([
            'user:id,name,email',
            'booking:id,user_id,venue_id,booking_date,start_time,end_time,total_hours,total_price,status,booking_code,checkin_at',
            'booking.venue:id,name,address,city_name,capacity,price_per_hour,category_id',
            'booking.venue.category:id,name',
            'payment:id,order_id,payment_status,invoice_id,external_id,payment_url,paid_at,expired_at',
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.transactions.transaction-detail', [
            'transaction' => $this->transaction,
        ]);
    }
}
