<div>
    <section class="w-full h-[500px] bg-cover bg-center flex items-center justify-center"
        style="background-image: url('{{ asset('image/hotel1.1.webp') }}');">
        <!-- Overlay (TIDAK NUTUP NAVBAR) -->
        <div class="inset-0 bg-black/70 z-0"></div>

        <!-- Content -->
        <div class="relative z-20 w-full max-w-5xl px-6 text-center text-white">

            <!-- JUDUL -->
            <h1 class="text-3xl md:text-5xl font-semibold mb-10 ">
                <span class="text-indigo-700 font-semibold">Sewa Tempat Impianmu</span> untuk acara anak muda tak
                terlupakan
            </h1>

            <!-- SEARCH -->
            <div class="bg-gray-100">
                <div class="bg-gray-800 py-6 px-4 sm:px-6 lg:px-8 shadow-md">
                    <div class="max-w-7xl mx-auto space-y-3">

                        <div class="w-full bg-white rounded-sm flex items-center px-4 py-3">
                            <svg class="w-6 h-6 text-gray-400 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input wire:model.live.debounce.300ms="search" type="text"
                                placeholder="Nama gedung atau venue..."
                                class="w-full bg-transparent border-none focus:ring-0 text-gray-700 placeholder-gray-400 text-sm">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">

                            <div class="bg-white rounded-sm flex items-center px-4 py-2">
                                <div class="mr-3">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <label class="block text-xs text-gray-400 uppercase font-bold">Kategori</label>
                                    <select wire:model.live="category"
                                        class="w-full p-0 border-none focus:ring-0 text-sm font-semibold text-gray-700 bg-transparent cursor-pointer">
                                        <option value="">Semua Kategori</option>
                                        {{-- @foreach ($categories as $cat)
                                            <option value="{{ $cat }}">{{ $cat }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="bg-white rounded-sm flex items-center px-4 py-2">
                                <div class="mr-3">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <label class="block text-xs text-gray-400 uppercase font-bold">Kota</label>
                                    <select wire:model.live="city"
                                        class="w-full p-0 border-none focus:ring-0 text-sm font-semibold text-gray-700 bg-transparent cursor-pointer">
                                        <option value="">Semua Kota</option>
                                        {{-- @foreach ($cities as $cityName)
                                            <option value="{{ $cityName }}">{{ $cityName }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="bg-white rounded-sm flex items-center px-4 py-2">
                                <div class="mr-3">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <label class="block text-xs text-gray-400 uppercase font-bold">Kapasitas</label>
                                    <input wire:model.live.debounce.500ms="capacity" type="number"
                                        placeholder="Min. Orang"
                                        class="w-full p-0 border-none focus:ring-0 text-sm font-semibold text-gray-700 bg-transparent">
                                </div>
                            </div>

                            <button wire:click="$refresh"
                                class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-4 rounded-sm transition duration-150 uppercase tracking-wide text-sm flex justify-center items-center h-full shadow-sm">
                                CARI RUANGAN
                            </button>
                        </div>
                    </div>
                </div>

                <div class="max-w-7xl mx-auto  px-4 sm:px-6 lg:px-8">
                </div>
            </div>


            <!-- SUBTITLE -->
            <p class="mt-8 text-white text-sm tracking-wide">
                <span class="text-indigo-700 font-semibold">RENCANAKAN KEBUTUHAN</span> MICE BERSAMA SEWAVENUE
            </p>
        </div>
    </section>

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        @if ($venues->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($venues as $venue)
                    <div class="bg-white shadow-sm rounded-lg overflow-hidden hover:shadow-md transition group">
                        <div class="h-48 bg-gray-200 w-full relative overflow-hidden">
                            @if ($venue->venue_img)
                                <img src="{{ asset('storage/' . $venue->image) }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="flex items-center justify-center h-full bg-gray-200 text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $venue->name }}</h3>
                            <div class="flex items-center text-sm text-gray-500 mb-3">
                                <svg class="w-4 h-4 mr-1 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $venue->city }}
                            </div>
                            <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                                <span class="text-xs font-medium text-gray-500 uppercase">{{ $venue->capacity }}
                                    Pax</span>
                                <span class="text-md font-bold text-yellow-600">Rp
                                    {{ number_format($venue->price_per_hour, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $venues->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <p class="text-gray-500 text-lg">Tidak menemukan hasil untuk "{{ $search }}"</p>
            </div>
        @endif
    </div>

    {{-- Be like water. --}}
</div>
