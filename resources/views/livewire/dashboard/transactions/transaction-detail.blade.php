<div class="bg-white rounded shadow-md border border-gray-200 overflow-hidden">
    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row items-center justify-between p-4 bg-white border-b border-gray-200">
        <h2 class="text-base font-semibold text-gray-700">Detail Transaksi</h2>
        <a href="{{ route('dashboard.transactions.index') }}" wire:navigate
            class="bg-blue-100 text-blue-600 hover:bg-blue-200 focus:ring-blue-300 inline-flex items-center gap-2 px-4 py-2 rounded text-sm transition whitespace-nowrap text-center justify-center w-full sm:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-start gap-4 p-5 bg-gray-50">
        <div>
            <p class="text-xs font-medium text-gray-500 mb-1">Kode Order</p>
            <h2 class="text-xl font-bold text-gray-800 uppercase">
                ODR-001
            </h2>
            <div class="mt-2">
                 <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full {{ $transaction->payment?->payment_status == 'PAID' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $transaction->payment?->payment_status ?? 'PENDING' }}
                </span>
            </div>
        </div>
        <div class="text-left sm:text-right">
            <p class="text-xs font-medium text-gray-500 mb-1">Total Pembayaran</p>
            <p class="text-xl font-bold text-blue-600">
                
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="p-5 space-y-4">
            <h3 class="text-sm font-bold text-gray-800 border-b border-gray-200 pb-2">Data Pengguna</h3>
            <div class="space-y-3">
                <div>
                    <p class="text-xs font-medium text-gray-500">Nama Lengkap</p>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $transaction->user?->name ?? '-' }}
                    </p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Alamat Email</p>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $transaction->user?->email ?? '-' }}
                    </p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Status Booking</p>                        
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $transaction->booking?->status ?? '-' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="p-5 space-y-4">
            <h3 class="text-sm font-bold text-gray-800 border-b border-gray-200 pb-2">Informasi Venue</h3>
            <div class="space-y-3">
                <div>
                    <p class="text-xs font-medium text-gray-500">Nama & Kapasitas</p>
                    <p class="text-sm font-semibold text-gray-800">
                        
                    </p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Harga Sewa</p>
                    <p class="text-sm font-semibold text-gray-800">
                        
                </div>
                <div>
                <p class="text-xs font-medium text-gray-500">Lokasi Lengkap</p>
                    <p class="text-sm font-semibold text-gray-800 leading-relaxed italic">
                        
                    </p>
                </div>
            </div>
        </div>

        <div class="md:col-span-2 p-5">
            <h3 class="text-sm font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">Detail Waktu & Invoice</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
                <div>
                    <p class="text-xs font-medium text-gray-500">Tanggal Sewa</p>
                    <p class="text-sm font-semibold text-gray-800">
                        
                    </p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Durasi</p>
                    <p class="text-sm font-semibold text-gray-800">
                        
                    </p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Invoice ID</p>
                    <p class="text-sm font-mono font-semibold text-gray-600">
                        
                    </p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500"></p>
                    <p class="text-sm font-semibold text-gray-800">
                        
                    </p>
                </div>
            </div>
        </div>   
    </div>

</div>