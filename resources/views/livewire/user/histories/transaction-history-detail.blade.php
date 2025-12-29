<div x-data="{ showQRModal: false }" x-on:open-qr-modal.window="showQRModal = true"
    x-on:close-qr-modal.window="showQRModal = false" class="bg-tp-black min-h-screen">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">
        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-tp-white">Detail Histori Transaksi</h1>
                <p class="text-sm text-tp-white/75 mt-1">Ringkasan transaksi, booking, dan pembayaran.</p>
            </div>

            <x-normal-button href="{{ route('transaction-histories.index') }}"
                class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded text-sm transition w-full sm:w-auto bg-tp-white text-tp-black hover:bg-tp-white/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
                Kembali
            </x-normal-button>
        </div>

        {{-- Main Card --}}
        <div class="bg-tp-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            {{-- Banner Kode + Total --}}
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 p-5 bg-gray-50 items-center">
                <div class="sm:col-span-8">
                    <p class="text-xs font-medium text-gray-500 mb-1">Kode Order / Booking</p>
                    <h2 class="text-xl font-bold text-gray-900 mb-2">
                        {{ $order->order_code ?? '-' }} <span class="text-gray-400">/</span>
                        {{ $order->booking?->booking_code ?? '-' }}
                    </h2>

                    <div class="mt-2 flex flex-wrap gap-2">
                        {{-- Status utama (payment/booking/order) --}}
                        <span
                            class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full {{ $statusBadge['class'] ?? 'bg-gray-100 text-gray-700' }}">
                            Status: {{ strtoupper($statusBadge['text'] ?? '-') }}
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-4 text-left">
                    <p class="text-xs font-medium text-gray-500 mb-1">Total Pembayaran</p>
                    <p class="text-xl font-bold text-gray-900">
                        Rp
                        {{ number_format((float) ($order->total_amount ?? ($order->booking?->total_price ?? 0)), 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-500 mt-1">
                        Tanggal order: {{ optional($order->created_at)->format('d-m-Y') ?? '-' }}
                    </p>
                </div>
            </div>

            {{-- Informasi Venue --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 border-t border-gray-200">
                {{-- Venue --}}
                <div class="p-5 lg:col-span-12 space-y-4">
                    <h3 class="text-sm font-bold text-gray-900 flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        Detail Venue
                    </h3>

                    <div class="space-y-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <p class="text-xs font-medium text-gray-500 mb-1">Nama Venue</p>
                            <p class="text-sm font-semibold text-gray-900">
                                {{ $order->booking?->venue?->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 mb-1">Kategori</p>
                            <p class="text-sm font-semibold text-gray-900">
                                {{ $order->booking?->venue?->category?->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 mb-1">Kota</p>
                            <p class="text-sm font-semibold text-gray-900">
                                {{ $order->booking?->venue?->city_name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 mb-1">Alamat</p>
                            <p class="text-sm font-semibold text-gray-900">
                                {{ $order->booking?->venue?->address ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 mb-1">Kapasitas</p>
                            <p class="text-sm font-semibold text-gray-900">
                                {{ $order->booking?->venue?->capacity ?? 0 }} Orang</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 mb-1">Harga per Jam</p>
                            <p class="text-sm font-semibold text-gray-900">
                                Rp
                                {{ number_format((float) ($order->booking?->venue?->price_per_hour ?? 0), 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Jadwal Booking --}}
            <div class="p-5 border-t border-gray-200 space-y-4">
                <h3 class="text-sm font-bold text-gray-900 flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Jadwal Booking
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Tanggal Sewa</p>
                        <p class="text-sm font-bold text-gray-900">
                            {{ $order->booking?->booking_date ? \Carbon\Carbon::parse($order->booking->booking_date)->format('d F Y') : '-' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Jam Sewa</p>
                        <p class="text-sm font-bold text-gray-900">
                            {{ $order->booking?->start_time ?? '-' }} - {{ $order->booking?->end_time ?? '-' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Total Durasi</p>
                        <p class="text-sm font-bold text-gray-900">
                            {{ $bookingDuration ?? ($order->booking?->total_hours ?? '-') }} Jam
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Status Kedatangan</p>
                        <p class="text-sm font-semibold text-gray-900">
                            {{ $order->booking?->checkin_at ? \Carbon\Carbon::parse($order->booking->checkin_at)->format('d M Y, H:i') : '-' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Data Pembayaran --}}
            <div class="p-5 border-t border-gray-200 space-y-4">
                <h3 class="text-sm font-bold text-gray-900 flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    Data Pembayaran
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Invoice ID</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $order->payment?->invoice_id ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">External ID</p>
                        <p class="text-sm font-semibold text-gray-900 break-all">
                            {{ $order->payment?->external_id ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Waktu Pembayaran</p>
                        <p class="text-sm font-bold text-gray-900">
                            {{ $order->payment?->paid_at ? \Carbon\Carbon::parse($order->payment->paid_at)->format('d M Y H:i') : 'N/A' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Batas Waktu</p>
                        <p class="text-sm font-bold text-red-600">
                            {{ $order->payment?->expired_at ? \Carbon\Carbon::parse($order->payment->expired_at)->format('d M Y H:i') : 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Timeline --}}
            @if (!empty($timelineSteps))
                <div class="p-5 border-t border-gray-200">
                    <h3 class="text-sm font-bold text-gray-900 mb-4">Timeline</h3>

                    <div class="space-y-3">
                        @foreach ($timelineSteps as $step)
                            @php
                                $stepStatus = $step['status'] ?? 'current';
                                $dotClass = 'bg-gray-300';
                                $textClass = 'text-gray-700';
                                if ($stepStatus === 'completed') {
                                    $dotClass = 'bg-green-500';
                                    $textClass = 'text-gray-900';
                                } elseif ($stepStatus === 'failed') {
                                    $dotClass = 'bg-red-500';
                                    $textClass = 'text-gray-900';
                                }
                            @endphp

                            <div class="flex items-start gap-3">
                                <div class="mt-1.5 h-2.5 w-2.5 rounded-full {{ $dotClass }}"></div>
                                <div class="min-w-0">
                                    <div class="text-sm font-semibold {{ $textClass }}">
                                        {{ $step['label'] ?? '-' }}</div>
                                    <div class="text-xs text-gray-500">{{ $step['description'] ?? '-' }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="flex justify-end m-4">
                @if ($order->status === 'pending' && $order->payment && $order->payment->payment_status === 'pending')
                    <div class="flex flex-wrap gap-2 mt-4">
                        {{-- BAYAR --}}
                        <button wire:click="pay"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition">
                            Bayar Sekarang
                        </button>

                        {{-- BATAL --}}
                        <button wire:click="cancelOrder"
                            wire:confirm="Apakah Anda yakin ingin membatalkan transaksi ini?"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded bg-red-100 hover:bg-red-200 text-red-700 text-sm font-semibold transition">
                            Batalkan Transaksi
                        </button>
                    </div>
                @endif

                @if ($order->status === 'paid')
                    <div class="flex flex-wrap gap-2 mt-4">
                        <button wire:click="downloadPdf" wire:loading.attr="disabled"
                            class="flex-1 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition disabled:opacity-60 flex items-center justify-center gap-2">
                            <svg wire:loading.remove class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <svg wire:loading class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span wire:loading.remove>Download Invoice PDF</span>
                            <span wire:loading>Generating PDF...</span>
                        </button>

                        @if ($order->booking?->qr_img)
                            <button wire:click="openQr"
                                class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition">
                                Lihat QR Booking
                            </button>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-modal show="showQRModal" title="QR Booking" maxWidth="md">
        @if ($order->booking?->qr_img)
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $order->booking->qr_img) }}" alt="QR Booking" class="w-56 h-56" />
            </div>

            <p class="text-xs text-center text-gray-500">
                Tunjukkan QR ini saat check-in venue
            </p>
        @else
            <p class="text-center text-sm text-gray-500">
                QR belum tersedia
            </p>
        @endif
        <x-slot:footer>
            <button @click="$dispatch('close-qr-modal')"
                class="h-10 px-4 rounded bg-gray-100 text-xs text-gray-700 hover:bg-gray-200 transition">
                Tutup
            </button>
        </x-slot:footer>
    </x-modal>
</div>
