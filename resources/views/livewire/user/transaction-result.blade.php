<div class="bg-tp-black min-h-screen py-10">
    <div class="max-w-2xl mx-auto px-4">

        @if ($isVerifying)
            <div wire:poll.2s="checkPaymentStatus"
                class="bg-white rounded-lg shadow-lg border border-gray-200 p-10 text-center">
                <svg class="animate-spin h-14 w-14 mx-auto text-indigo-600 mb-6" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8z" />
                </svg>

                <h2 class="text-xl font-semibold text-gray-900">
                    Memverifikasi Pembayaran
                </h2>

                <p class="text-gray-600 mt-2">
                    Mohon tunggu, sistem sedang mengecek status pembayaran Anda
                </p>

                <div class="mt-6">
                    <div class="text-4xl font-bold text-indigo-600">
                        {{ $verifyCountdown }}
                    </div>
                    <p class="text-sm text-gray-500 mt-1">
                        detik tersisa
                    </p>
                </div>
            </div>
        @endif

        @if ($isSuccess)
            <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-indigo-600 p-8 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full mb-4 ">
                        <svg class="size-12 text-green-500" fill="currentColor" stroke="none" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white mb-2">Pembayaran Berhasil!</h1>
                    <p class="text-green-100">Terima kasih atas pembayaran Anda</p>
                </div>

                <div class="p-6 space-y-4">
                    <div class="border-b pb-4">
                        <h2 class="text-sm font-semibold text-gray-500 mb-3">INFORMASI BOOKING</h2>

                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Kode Order</span>
                                <span class="font-semibold text-gray-900">{{ $order->order_code }}</span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Venue</span>
                                <span class="font-semibold text-gray-900">{{ $order->booking->venue->name }}</span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Tanggal Booking</span>
                                <span class="font-semibold text-gray-900">
                                    {{ \Carbon\Carbon::parse($order->booking->booking_date)->format('d M Y') }}
                                </span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Jam</span>
                                <span class="font-semibold text-gray-900">
                                    {{ $order->booking->start_time }} - {{ $order->booking->end_time }}
                                </span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Durasi</span>
                                <span class="font-semibold text-gray-900">{{ $order->booking->total_hours }} jam</span>
                            </div>
                        </div>
                    </div>

                    <div class="border-b pb-4">
                        <h2 class="text-sm font-semibold text-gray-500 mb-3">INFORMASI PEMBAYARAN</h2>

                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Transaction ID</span>
                                <span class="font-mono text-xs text-gray-900">{{ $order->payment->external_id }}</span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Status</span>
                                <span class="font-semibold text-green-600">
                                    Pembayaran Berhasil
                                </span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Tanggal Bayar</span>
                                <span class="font-semibold text-gray-900">
                                    {{ $order->payment->paid_at->format('d M Y, H:i') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2">
                        <div class="flex justify-between items-center text-lg font-bold">
                            <span class="text-gray-900">Total Pembayaran</span>
                            <span class="text-green-600">Rp
                                {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 flex gap-3">
                    <button wire:click="downloadPdf" wire:loading.attr="disabled"
                        class="flex-1 px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition disabled:opacity-60 flex items-center justify-center gap-2">
                        <svg wire:loading.remove class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <svg wire:loading class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span wire:loading.remove>Download Invoice PDF</span>
                        <span wire:loading>Generating PDF...</span>
                    </button>

                    <a href="{{ route('transaction-histories.index') }}"
                        class="px-4 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-center">
                        Lihat Riwayat
                    </a>
                </div>
            </div>
        @endif

        @if (!$isSuccess && !$isVerifying)
            <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-indigo-600 p-8 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full mb-4">
                        <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white mb-2">Pembayaran Gagal</h1>
                    <p class="text-red-100">Transaksi Anda tidak dapat diproses</p>
                </div>

                <div class="p-6 space-y-4">
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                        <p class="text-sm text-red-800">
                            <strong>Status:</strong>
                            {{ $order->payment ? ucfirst($order->payment->payment_status) : 'Unknown' }}
                        </p>
                        @if ($order->payment && $order->payment->payment_status === 'expire')
                            <p class="text-sm text-red-700 mt-2">
                                Pembayaran telah melewati batas waktu. Silakan buat booking baru.
                            </p>
                        @endif
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Kode Order</span>
                            <span class="font-semibold text-gray-900">{{ $order->order_code }}</span>
                        </div>

                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Venue</span>
                            <span class="font-semibold text-gray-900">{{ $order->booking->venue->name }}</span>
                        </div>

                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Total</span>
                            <span class="font-semibold text-gray-900">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 flex gap-3">
                    @if ($order->status === 'pending' && $order->payment && $order->payment->payment_status === 'pending')
                        <a href="{{ route('orders.pay', $order) }}"
                            class="flex-1 px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition text-center">
                            Coba Bayar Lagi
                        </a>
                    @else
                        <a href="{{ route('venues.index') }}"
                            class="flex-1 px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition text-center">
                            Booking Lagi
                        </a>
                    @endif

                    <a href="{{ route('transaction-histories.index') }}"
                        class="px-4 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition text-center">
                        Lihat Riwayat
                    </a>
                </div>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mt-4 bg-red-50 border border-red-200 rounded-lg p-4">
                <p class="text-sm text-red-800">{{ session('error') }}</p>
            </div>
        @endif
    </div>
</div>
