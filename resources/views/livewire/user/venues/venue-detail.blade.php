<div class="bg-gradient-to-b from-indigo-50 to-white">
    <section class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-10">

        <!-- LEFT CONTENT -->
        <div class="lg:col-span-2 space-y-6 text-black">

            <div>
                <h2 class="text-3xl font-bold text-gray-900">
                    {{ $venue->name }}
                </h2>

                <p class="text-gray-600 text-sm mt-2 flex items-center gap-2">
                    <svg class="size-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">{{ $venue->city_name }}, Jawa Barat</span>
                </p>
            </div>

            <!-- Image -->
            <div class="relative overflow-hidden rounded-2xl shadow-2xl group">
                <img src="{{ asset('storage/' . $venue->venue_img) }}" alt="{{ $venue->name }}"
                    class="w-full h-[300px] md:h-[450px] object-cover transition-transform duration-700 group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
            </div>

            <!-- Capacity & Category -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wide">
                    Informasi Venue
                </h3>

                <div class="grid grid-cols-2 gap-6 text-sm">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="size-5 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Kapasitas</p>
                            <p class="font-bold text-gray-900">{{ $venue->capacity }} Orang</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="size-5 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Kategori</p>
                            <p class="font-bold text-gray-900">{{ $venue->category->name }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <h3 class="text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">
                    Deskripsi
                </h3>
                <p class="text-sm text-gray-700 leading-relaxed">
                    {{ $venue->description }}
                </p>
            </div>
        </div>

        <!-- RIGHT SIDEBAR - BOOKING FORM -->
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden h-fit sticky top-6 shadow-xl">
            <!-- Header Price -->
            <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 p-6">
                <div class="text-center">
                    <p class="text-sm text-indigo-200 font-medium uppercase tracking-wide mb-1">Harga</p>
                    <p class="text-3xl text-white font-bold">
                        Rp {{ number_format($venue->price_per_hour, 0, ',', '.') }}
                    </p>
                    <p class="text-sm text-indigo-200">per jam</p>
                </div>
            </div>

            <form wire:submit.prevent="bookNow" class="p-6 space-y-5">
                @if (session()->has('error'))
                    <div class="bg-red-50 border border-red-200 rounded-lg p-3">
                        <p class="text-red-600 text-xs font-medium">{{ session('error') }}</p>
                    </div>
                @endif

                @error('booking_date')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
                @error('start_time')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
                @error('end_time')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror

                <!-- Tanggal -->
                <div>
                    <label class="text-xs uppercase font-bold text-gray-700 mb-2 block">Pilih Tanggal</label>
                    <div class="relative">
                        <input type="date" wire:model.live="booking_date" min="{{ now()->toDateString() }}"
                            class="w-full border-2 border-gray-300 focus:border-indigo-600 rounded-lg px-4 py-3 text-sm text-black focus:outline-none transition-colors">
                        <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                    </div>
                </div>

                <!-- Button Ketersediaan -->
                <button type="button" wire:click="toggleAvailability"
                    class="w-full flex items-center justify-between px-4 py-3 bg-indigo-50 border-2 border-indigo-200 hover:border-indigo-300 rounded-lg text-sm font-semibold text-indigo-700 hover:bg-indigo-100 transition-all">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Lihat Jam Tersedia</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform {{ $show_availability ? 'rotate-180' : '' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Jam Tersedia Grid -->
                @if ($show_availability)
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 space-y-4 animate-fadeIn">
                        <div class="flex items-center justify-between">
                            <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wide">Jam Operasional</h4>
                            <div class="flex gap-3 text-[10px] font-medium">
                                <div class="flex items-center gap-1.5">
                                    <div class="w-3 h-3 bg-green-500 rounded"></div>
                                    <span class="text-gray-600">Tersedia</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <div class="w-3 h-3 bg-red-500 rounded"></div>
                                    <span class="text-gray-600">Terboking</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-4 gap-2 max-h-64 overflow-y-auto">
                            @foreach ($this->available_hours as $slot)
                                <div
                                    class="px-3 py-2.5 rounded-lg text-xs font-bold transition-all
                                        {{ $slot['is_booked'] ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                    {{ $slot['time'] }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Time Range Picker -->
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-xs uppercase font-bold text-gray-700 mb-2 block">Jam Mulai</label>
                        <select wire:model.live="start_time"
                            class="w-full border-2 border-gray-300 focus:border-indigo-600 rounded-lg px-3 py-3 text-sm text-black focus:outline-none transition-colors">
                            <option value="">Pilih</option>
                            @foreach ($this->start_time_options as $option)
                                <option value="{{ $option['value'] }}" @disabled($option['disabled'])>
                                    {{ $option['label'] }}{{ $option['disabled'] ? ' (Terboking)' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-xs uppercase font-bold text-gray-700 mb-2 block">Jam Selesai</label>
                        <select wire:model.live="end_time" {{ !$start_time ? 'disabled' : '' }}
                            class="w-full border-2 border-gray-300 focus:border-indigo-600 rounded-lg px-3 py-3 text-sm text-black focus:outline-none transition-colors disabled:bg-gray-100 disabled:cursor-not-allowed">
                            <option value="">{{ $start_time ? 'Pilih' : 'Pilih jam mulai dulu' }}</option>
                            @foreach ($this->end_time_options as $option)
                                <option value="{{ $option['value'] }}">
                                    {{ $option['label'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Rincian Harga -->
                <div class="space-y-2 pt-4 border-t-2 border-gray-200">
                    <p class="text-xs font-bold text-gray-700 uppercase tracking-wide">Rincian Harga</p>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600 font-medium">
                            {{ $total_hours }} jam × Rp {{ number_format($venue->price_per_hour, 0, ',', '.') }}
                        </span>
                        <span class="text-lg font-bold text-indigo-600">
                            Rp {{ number_format($total_price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                <!-- Button Book -->
                <button type="submit" wire:loading.attr="disabled" @disabled(!$booking_date || !$start_time || !$end_time || $total_hours <= 0)
                    class="w-full bg-indigo-600 hover:bg-indigo-700 disabled:bg-gray-300 disabled:cursor-not-allowed
                           text-white font-bold py-4 rounded-lg shadow-lg shadow-indigo-500/50 hover:shadow-indigo-600/50 transition-all duration-200 uppercase tracking-wider">
                    <span wire:loading.remove>Book Sekarang</span>
                    <span wire:loading>Processing...</span>
                </button>
            </form>
        </div>
    </section>
</div>
