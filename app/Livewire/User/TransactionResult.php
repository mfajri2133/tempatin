<?php

namespace App\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

#[Layout('layouts.app', ['title' => 'Hasil Transaksi'])]
class TransactionResult extends Component
{
    public Order $order;
    public $isSuccess = false;

    public function mount(Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);

        $this->order = $order->load(['booking.venue', 'payment', 'user']);

        $this->isSuccess =
            $this->order->payment !== null &&
            $this->order->payment->payment_status === 'paid';
    }

    public function downloadPdf()
    {
        if (!$this->isSuccess) {
            session()->flash('error', 'Hanya transaksi yang berhasil yang dapat diunduh.');
            return;
        }

        $pdf = Pdf::loadView('pdf.transaction-receipt', [
            'order' => $this->order
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Invoice-' . $this->order->order_code . '.pdf');
    }

    public function render()
    {
        return view('livewire.user.transaction-result');
    }
}
