<div class="bg-white rounded shadow-md border border-gray-200 overflow-hidden">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row items-center justify-between p-4 bg-white border-b border-gray-200">
        <h2 class="text-base font-semibold text-gray-700">Informasi Venue</h2>
        <a href="{{ route('dashboard.venues.index') }}" wire:navigate
            class="bg-blue-100 text-blue-600 hover:bg-blue-200 focus:ring-blue-300 inline-flex items-center gap-2 px-4 py-2 rounded text-sm transition whitespace-nowrap text-center justify-center w-full sm:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Image -->
    <div class="w-full h-64 sm:h-72 overflow-hidden">
        @if ($venue->venue_img)
            <img src="{{ asset('storage/' . $venue->venue_img) }}" alt="{{ $venue->name }}"
                class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6.75a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6.75v10.5a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </div>
        @endif
    </div>

    <!-- Nama dan Harga -->
    <div class="flex flex-col sm:flex-row justify-between items-start gap-4 p-5 bg-gray-50">
        <div class="flex-1">
            <p class="text-xs font-medium text-gray-500 mb-1">Nama Tempat</p>
            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $venue->name }}</h2>
            <span
                class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full {{ $venue->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                {{ ucfirst($venue->status) }}
            </span>
        </div>

        <div class="text-left sm:text-right">
            <p class="text-xs font-medium text-gray-500 mb-1">Harga per Jam</p>
            <p class="text-xl font-bold text-blue-600">Rp {{ number_format($venue->price_per_hour, 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Detail Informasi -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-5">
        <div class="space-y-1">
            <p class="text-xs font-medium text-gray-500">Kategori</p>
            <p class="text-sm font-semibold text-gray-800">{{ $venue->category->name ?? '-' }}</p>
        </div>

        <div class="space-y-1">
            <p class="text-xs font-medium text-gray-500">Kapasitas</p>
            <p class="text-sm font-semibold text-gray-800">{{ $venue->capacity }} Orang</p>
        </div>

        <div class="space-y-1">
            <p class="text-xs font-medium text-gray-500">Kota</p>
            <p class="text-sm font-semibold text-gray-800">{{ $venue->city_name }}</p>
        </div>

        <div class="sm:col-span-3 space-y-1">
            <p class="text-xs font-medium text-gray-500">Alamat</p>
            <p class="text-sm font-semibold text-gray-800 leading-relaxed">{{ $venue->address }}</p>
        </div>
    </div>
</div>
