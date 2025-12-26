<div class="bg-tp-black min-h-screen py-10">
    <div class="max-w-3xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
            <h1 class="text-xl font-bold text-tp-black mb-6">
                Pembayaran
            </h1>

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
                <a href="{{ route('transaction-histories.index') }}"
                    class="px-4 py-2 rounded border border-gray-300 text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
                    Kembali
                </a>

                <button wire:click="pay" wire:loading.attr="disabled"
                    class="px-6 py-2 rounded bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm transition disabled:opacity-60">
                    <span wire:loading.remove>Lanjutkan Pembayaran</span>
                    <span wire:loading>Processing...</span>
                </button>
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
                    window.location.href = "/orders/{{ $order->id }}/result";
                },

                onPending: function(result) {
                    window.location.href = "/orders/{{ $order->id }}/result";
                },

                onError: function(result) {
                    alert('Pembayaran gagal: ' + (result.status_message ||
                        'Terjadi kesalahan'));
                },
                onClose: function() {
                    alert('Anda menutup popup pembayaran tanpa menyelesaikan pembayaran.');
                }
            });
        });
    });
</script>
