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
    public ?Order $order = null;
    public bool $isSuccess = false;
    public bool $isVerifying = false;
    public int $verifyCountdown = 15;

    public function mount()
    {
        $orderCode = request()->query('order_id');
        abort_if(!$orderCode, 404);

        $this->order = Order::with(['booking.venue', 'payment', 'user'])
            ->where('order_code', $orderCode)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->evaluateStatus();
    }

    public function checkPaymentStatus()
    {
        $this->order->refresh();

        $this->verifyCountdown--;

        $this->evaluateStatus();

        if ($this->verifyCountdown <= 0 && !$this->isSuccess) {
            $this->isVerifying = false;
        }
    }

    private function evaluateStatus(): void
    {
        $paymentStatus = $this->order->payment?->payment_status;

        if (in_array($paymentStatus, ['capture', 'settlement'])) {
            $this->isSuccess = true;
            $this->isVerifying = false;
            return;
        }

        if (in_array($paymentStatus, ['pending', 'challenge']) || !$paymentStatus) {
            $this->isVerifying = true;
            return;
        }

        $this->isSuccess = false;
        $this->isVerifying = false;
    }

    public function downloadPdf()
    {
        abort_if(!$this->isSuccess, 403);

        $pdf = Pdf::loadView('pdf.transaction-receipt', [
            'order' => $this->order
        ]);

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'Invoice-' . $this->order->order_code . '.pdf'
        );
    }

    public function render()
    {
        return view('livewire.user.transaction-result');
    }
}
