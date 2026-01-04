<div class="bg-white rounded shadow-md border border-gray-200 overflow-hidden">
    {{-- 1. Header Detail --}}
    <div class="flex flex-col gap-4 sm:flex-row items-center justify-between p-4 bg-white border-b border-gray-200">
        <div class="flex items-center gap-3">
            <h2 class="text-base font-semibold text-gray-700">Detail Transaksi & Booking</h2>
        </div>
        <a href="{{ route('dashboard.transactions.index') }}" wire:navigate
            class="bg-blue-100 text-blue-600 hover:bg-blue-200 focus:ring-blue-300 inline-flex items-center gap-2 px-4 py-2 rounded text-sm transition whitespace-nowrap text-center justify-center w-full sm:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
            Kembali
        </a>
    </div>

    {{-- 2. Banner Kode Order & Total Harga --}}
    <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 p-5 bg-gray-50 items-center">
        <div class="sm:col-span-8">
            <p class="text-xs font-medium text-gray-500 mb-1">Kode Order / Booking</p>
            <h2 class="text-xl font-bold text-gray-800 mb-2">
                {{ $transaction->order_code }} <span class="text-gray-400">/</span>
                {{ $transaction->booking?->booking_code ?? '-' }}
            </h2>
            <div class="mt-2 flex flex-wrap gap-2">
                {{-- Status Payment --}}
                <span
                    class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full
                    {{ $transaction->payment?->payment_status == 'pending' ? 'bg-indigo-100 text-indigo-700' : '' }}
                    {{ $transaction->payment?->payment_status == 'paid' ? 'bg-green-100 text-green-700' : '' }}
                    {{ $transaction->payment?->payment_status == 'expired' ? 'bg-orange-100 text-orange-700' : '' }}
                    {{ $transaction->payment?->payment_status == 'failed' ? 'bg-red-100 text-red-700' : '' }}
                    {{ !$transaction->payment ? 'bg-gray-100 text-gray-700' : '' }}">
                    Payment: {{ strtoupper($transaction->payment?->payment_status ?? 'PENDING') }}
                </span>

                {{-- Status Booking --}}
                <span
                    class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full
                    {{ $transaction->booking?->status == 'waiting' ? 'bg-amber-100 text-amber-700' : '' }}
                    {{ $transaction->booking?->status == 'progress' ? 'bg-blue-100 text-blue-700' : '' }}
                    {{ $transaction->booking?->status == 'finished' ? 'bg-green-100 text-green-700' : '' }}
                    {{ $transaction->booking?->status == 'cancelled' ? 'bg-red-100 text-red-700' : '' }}
                    {{ !$transaction->booking ? 'bg-gray-100 text-gray-700' : '' }}">
                    Booking: {{ strtoupper($transaction->booking?->status ?? '-') }}
                </span>
            </div>
        </div>

        <div class="sm:col-span-4 text-left lg:text-left ml-2">
            <p class="text-xs font-medium text-gray-500 mb-1">Total Pembayaran</p>
            <p class="text-xl font-bold text-blue-600">
                Rp {{ number_format($transaction->total_amount ?? 0, 0, ',', '.') }}
            </p>
        </div>
    </div>

    {{-- Informasi Pelanggan & Detail Venue --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 border-b border-gray-200">
        {{-- Pelanggan --}}
        <div class="p-5 lg:col-span-4 space-y-4 border-b border-gray-200 lg:border-b-0">
            <h3 class="text-sm font-bold text-gray-800 flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                Informasi Pelanggan
            </h3>
            <div class="space-y-4">
                <div>
                    <p class="text-xs font-medium text-gray-500 mb-1">Nama Lengkap</p>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $transaction->user?->name ?? '-' }}
                    </p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500 mb-1">Email</p>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $transaction->user?->email ?? '-' }}
                    </p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500 mb-1">Check-in Pada</p>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $transaction->booking?->checkin_at ?? '-' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Venue --}}
        <div class="p-5 lg:col-span-8 space-y-4">
            <h3 class="text-sm font-bold text-gray-800 flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                Detail Lokasi Venue
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Nama Venue</p>
                        <p class="text-sm font-semibold text-gray-800">
                            {{ $transaction->booking?->venue?->name ?? '-' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Kategori</p>
                        <p class="text-sm font-semibold text-gray-800">
                            {{ $transaction->booking?->venue?->category?->name ?? '-' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Kota</p>
                        <p class="text-sm font-semibold text-gray-800">
                            {{ $transaction->booking?->venue?->city_name ?? '-' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Alamat Lengkap</p>
                        <p class="text-sm font-semibold text-gray-800">
                            {{ $transaction->booking?->venue?->address ?? '-' }}
                        </p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Kapasitas</p>
                        <p class="text-sm font-semibold text-gray-800">
                            {{ $transaction->booking?->venue?->capacity ?? 0 }} Orang
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1">Harga Per Jam</p>
                        <p class="text-sm font-semibold text-gray-800">
                            Rp {{ number_format($transaction->booking?->venue?->price_per_hour ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Jadwal Booking --}}
    <div class="p-5 border-b border-gray-200 space-y-4">
        <h3 class="text-sm font-bold text-gray-800 flex gap-2">
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
                <p class="text-sm font-bold text-gray-800">
                    {{ \Carbon\Carbon::parse($transaction->booking?->booking_date)->format('d F Y') }}
                </p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 mb-1">Jam Sewa</p>
                <p class="text-sm font-bold text-gray-800">
                    {{ $transaction->booking?->start_time }} - {{ $transaction->booking?->end_time }}
                </p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 mb-1">Total Durasi</p>
                <p class="text-sm font-bold text-gray-800">
                    {{ $transaction->booking?->total_hours ?? 0 }} Jam
                </p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 mb-1">Status Kedatangan</p>
                <p class="text-sm font-semibold text-gray-800">
                    {{ $transaction->booking?->checkin_at ?? '-' }}
                </p>
            </div>
        </div>
    </div>

    {{-- Pembayaran --}}
    <div class="p-5 space-y-4">
        <h3 class="text-sm font-bold text-gray-800 flex gap-2">
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
                <p class="text-sm font-semibold text-gray-800">
                    {{ $transaction->payment?->invoice_id ?? '-' }}
                </p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 mb-1">External ID</p>
                <p class="text-sm font-semibold text-gray-800 break-all">
                    {{ $transaction->payment?->external_id ?? '-' }}
                </p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 mb-1">Waktu Pembayaran</p>
                <p class="text-sm font-bold text-gray-800">
                    {{ $transaction->payment?->paid_at ?? '-' }}
                </p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 mb-1">Batas Wsaktu</p>
                <p class="text-sm font-bold text-red-500">
                    {{ $transaction->payment?->expired_at ?? '-' }}
                </p>
            </div>
        </div>
    </div>
</div>
