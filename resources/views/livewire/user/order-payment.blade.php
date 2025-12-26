<div class="bg-tp-black min-h-screen py-10">
    <div class="max-w-3xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <h1 class="text-xl font-bold text-tp-black mb-6">
                Pembayaran
            </h1>

            {{-- Flash Messages --}}
            @if (session()->has('error'))
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4 flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-red-800">Perhatian!</p>
                        <p class="text-sm text-red-700 mt-1">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-start gap-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm text-green-800">{{ session('success') }}</p>
                </div>
            @endif

            {{-- Countdown Timer --}}
            @if ($order->payment && $order->payment->expired_at && !$isExpired)
                <div class="mb-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-semibold text-yellow-800">Selesaikan pembayaran dalam:</p>
                                <p id="countdown" class="text-lg font-bold text-yellow-900 mt-1">--:--</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="space-y-4 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Kode Order</span>
                    <span class="font-semibold text-tp-black">
                        {{ $order->order_code }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Venue</span>
                    <span class="font-semibold text-tp-black">
                        {{ $order->booking->venue->name }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Tanggal Booking</span>
                    <span class="font-semibold text-tp-black">
                        {{ \Carbon\Carbon::parse($order->booking->booking_date)->format('d M Y') }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Jam</span>
                    <span class="font-semibold text-tp-black">
                        {{ $order->booking->start_time }} – {{ $order->booking->end_time }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Durasi</span>
                    <span class="font-semibold text-tp-black">
                        {{ $order->booking->total_hours }} jam
                    </span>
                </div>

                <hr>

                <div class="flex justify-between text-base font-bold">
                    <span class="text-black">Total Pembayaran</span>
                    <span class="text-indigo-600">
                        Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            <div class="mt-8 flex gap-3 justify-end">
                @if ($isExpired)
                    {{-- Jika Expired --}}
                    <a href="{{ route('venues.index') }}"
                        class="px-6 py-2 rounded bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm transition">
                        Booking Lagi
                    </a>
                @else
                    {{-- Normal Buttons --}}
                    <button wire:click="cancelPayment" wire:loading.attr="disabled"
                        wire:confirm="Apakah Anda yakin ingin membatalkan pembayaran ini?"
                        class="px-4 py-2 rounded border border-red-300 text-sm font-medium text-red-600 hover:bg-red-50 transition disabled:opacity-60">
                        <span wire:loading.remove wire:target="cancelPayment">Batalkan</span>
                        <span wire:loading wire:target="cancelPayment">Cancelling...</span>
                    </button>

                    <a href="{{ route('transaction-histories.index') }}"
                        class="px-4 py-2 rounded border border-gray-300 text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
                        Kembali
                    </a>

                    <button wire:click="pay" wire:loading.attr="disabled"
                        class="px-6 py-2 rounded bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm transition disabled:opacity-60">
                        <span wire:loading.remove wire:target="pay">Lanjutkan Pembayaran</span>
                        <span wire:loading wire:target="pay">Processing...</span>
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.client_key') }}"></script>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('open-midtrans', (data) => {
            window.snap.pay(data.token, {
                onSuccess: function(result) {
                    window.location.href = "/transactions/{{ $order->id }}/result";
                },

                onPending: function(result) {
                    window.location.href = "/transactions/{{ $order->id }}/result";
                },

                onError: function(result) {
                    alert('Pembayaran gagal: ' + (result.status_message ||
                        'Terjadi kesalahan'));
                },

                onClose: function() {
                    console.log('Popup ditutup tanpa pembayaran');
                }
            });
        });
    });

    @if ($order->payment && $order->payment->expired_at && !$isExpired)
        const expiredAt = new Date('{{ $order->payment->expired_at->format('Y-m-d H:i:s') }}').getTime();

        const countdownInterval = setInterval(function() {
            const now = new Date().getTime();
            const distance = expiredAt - now;

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById('countdown').textContent = 'EXPIRED';

                setTimeout(() => {
                    window.location.reload();
                }, 1000);

                return;
            }

            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('countdown').textContent =
                String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
        }, 1000);
    @endif
</script>
