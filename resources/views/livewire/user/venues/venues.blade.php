<div>
    <section class="w-full h-[500px] bg-cover bg-center flex items-center justify-center relative"
        style="background-image: url('{{ asset('image/hotel1.1.webp') }}');">
        <div class="absolute inset-0 bg-[#0f0f0f]/60"></div>

        <div class="relative z-20 w-full max-w-5xl px-6 text-center text-white">
            <div
                class="bg-[#0f0f0f]/80 backdrop-blur-sm py-6 px-4 sm:px-6 shadow-2xl rounded-lg border border-indigo-500/20">
                <div class="max-w-7xl mx-auto space-y-3">

                    <div class="w-full bg-white rounded-lg flex items-center px-4 py-3 shadow-sm">
                        <svg class="size-4 text-indigo-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input wire:model.defer="searchInput" type="text" placeholder="Masukan nama venue"
                            class="w-full bg-transparent border-none focus:ring-0 text-gray-700 text-sm placeholder:text-gray-400" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div class="bg-white rounded-lg flex items-center px-4 py-2 shadow-sm">
                            <div class="mr-3">
                                <svg class="size-4 text-indigo-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <div class="w-full">
                                <label class="block text-xs text-gray-500 uppercase font-bold">Kategori</label>
                                <select wire:model.defer="category"
                                    class="w-full p-0 border-none focus:ring-0 text-sm font-semibold text-gray-700 bg-transparent">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Filter Kota -->
                        <div class="bg-white rounded-lg flex items-center px-4 py-2 shadow-sm">
                            <div class="mr-3">
                                <svg class="size-4 text-indigo-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="w-full">
                                <label class="block text-xs text-gray-500 uppercase font-bold">Kota</label>
                                <select wire:model.defer="city_code"
                                    class="w-full p-0 border-none focus:ring-0 text-sm font-semibold text-gray-700 bg-transparent">
                                    <option value="">Semua Kota</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city['code'] }}">
                                            {{ $city['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Filter Kapasitas -->
                        <div class="bg-white rounded-lg flex items-center px-4 py-2 shadow-sm">
                            <div class="mr-3">
                                <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="w-full">
                                <label class="block text-xs text-gray-500 uppercase font-bold">Kapasitas</label>
                                <select wire:model.defer="capacity"
                                    class="w-full p-0 border-none focus:ring-0 text-sm font-semibold text-gray-700 bg-transparent">
                                    <option value="">Semua Kapasitas</option>
                                    <option value="1-25">1 – 25 orang</option>
                                    <option value="26-50">26 – 50 orang</option>
                                    <option value="51-75">51 – 75 orang</option>
                                    <option value="76-100">76 – 100 orang</option>
                                    <option value="100+">100+ orang</option>
                                </select>
                            </div>
                        </div>

                        <button wire:click="applyFilter" type="button"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-lg uppercase tracking-wider transition-all duration-200 ">
                            CARI
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-[#0f0f0f]">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">
            @if ($venues->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach ($venues as $venue)
                        <a href="{{ route('venues.show', $venue->id) }}" wire:navigate
                            class="group block bg-white rounded-xl overflow-hidden hover:shadow-2xl hover:shadow-indigo-500/20 transition-all duration-300 border border-gray-100 hover:border-indigo-300 hover:-translate-y-1">
                            <div class="relative h-52 bg-gray-100 overflow-hidden">
                                @if ($venue->venue_img)
                                    <img src="{{ asset('storage/' . $venue->venue_img) }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                        alt="{{ $venue->name }}">
                                @else
                                    <div
                                        class="flex items-center justify-center h-full bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50">
                                        <svg class="w-16 h-16 text-indigo-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                            </path>
                                        </svg>
                                    </div>
                                @endif

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </div>

                            <div class="p-5">
                                <div class="flex items-start justify-between gap-3 mb-3">
                                    <h3
                                        class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition-colors line-clamp-2 flex-1">
                                        {{ $venue->name }}
                                    </h3>
                                </div>

                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="size-6 rounded-full bg-indigo-100 flex items-center justify-center flex-shrink-0">
                                            <svg class="size-3.5 text-indigo-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-gray-700 font-medium">
                                            {{ $venue->category->name }}
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <div
                                            class="size-6 rounded-full bg-indigo-100 flex items-center justify-center flex-shrink-0">
                                            <svg class="size-3.5 text-indigo-600" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <span
                                            class="text-sm text-gray-700 line-clamp-1">{{ $venue->city_name }}</span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <div
                                            class="size-6 rounded-full bg-indigo-100 flex items-center justify-center flex-shrink-0">
                                            <svg class="size-3.5 text-indigo-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <span class="text-sm text-gray-700">{{ $venue->capacity }} orang</span>
                                    </div>
                                </div>

                                <div class="pt-4 border-t border-gray-100">
                                    <div class="flex items-baseline justify-between">
                                        <span
                                            class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Harga</span>
                                        <div class="text-right">
                                            <span class="text-xl font-bold text-indigo-600">
                                                Rp {{ number_format($venue->price_per_hour, 0, ',', '.') }}
                                            </span>
                                            <span class="text-sm text-gray-500 ml-1">/ jam</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $venues->links() }}
                </div>
            @else
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 mb-4">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-400 text-lg font-medium">Tidak ada venue yang ditemukan</p>
                    <p class="text-gray-500 text-sm mt-2">Coba ubah filter pencarian Anda</p>
                </div>
            @endif
        </div>
    </div>
</div>