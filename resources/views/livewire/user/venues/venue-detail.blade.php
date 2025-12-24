<div class="bg-indigo-50">
    <section class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-10">

        <div class="lg:col-span-2 space-y-6 text-black">

            <div>
                <h2 class="text-2xl font-semibold flex items-center gap-2">
                    {{ $venue->name }}
                </h2>

                <p class="text-gray-500 text-sm mt-1 flex items-center gap-1">
                    <svg class="size-3.5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                    </svg>

                    {{ $venue->city_name }}, Jawa Barat
                </p>
            </div>

            <div class="relative overflow-hidden rounded-xl group shadow-lg">
                <img src="{{ asset('storage/' . $venue->venue_img) }}" alt="{{ $venue->name }}"
                    class="w-full h-[300px] md:h-[450px] object-bottom transition-transform duration-500 group-hover:scale-105">
            </div>

            <div class="border rounded-lg p-5">
                <h3 class="text-sm font-semibold text-gray-500 mb-4">
                    Kapasitas & kategori
                </h3>

                <div class="grid grid-cols-2 md:grid-cols-2 gap-6 text-sm">
                    <div>
                        <p class="text-gray-400 flex items-center gap-2">
                            <svg class="size-3.5 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Kapasitas
                        </p>

                        <p class="font-medium">{{ $venue->capacity }} Orang</p>
                    </div>

                    <div>
                        <p class="text-gray-400 flex items-center gap-2">
                            <svg class="size-3.5 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            Kategori
                        </p>

                        <p class="font-medium">{{ $venue->category->name }}</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-500 mb-3">
                    Deskripsi
                </h3>

                <p class="text-sm text-gray-700 leading-relaxed">
                    {!! nl2br(e($venue->description)) !!}
                </p>
            </div>
        </div>

        <div class="bg-white border rounded-lg overflow-hidden h-fit sticky top-10 shadow-sm w-full max-w-[400px]">
            <div class="bg-indigo-400 text-white p-4 flex items-center justify-center gap-2">
                <p class="text-xl text-black font-bold">
                    Rp {{ number_format($venue->price_per_hour, 0, ',', '.') }} / jam
                </p>
            </div>

            <form wire:submit.prevent="bookNow" class="bg-indigo-50 p-5 space-y-4">
                @if (session()->has('error'))
                    <p class="text-red-500 text-xs">{{ session('error') }}</p>
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

                <div>
                    <label class="text-[11px] uppercase font-bold text-gray-500 mb-2 block">Tanggal</label>
                    <input type="date" wire:model.live="booking_date" min="{{ now()->toDateString() }}"
                        class="w-full border border-gray-400 rounded px-3 py-2 text-sm text-black focus:outline-none focus:border-indigo-500">
                </div>

                <button type="button" wire:click="toggleAvailability"
                    class="w-full flex items-center justify-between px-4 py-3 bg-transparent border border-gray-400 rounded text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        <span class="font-medium">Ketersediaan Jam</span>
                    </div>
                    <svg class="w-5 h-5 transition-transform {{ $show_availability ? 'rotate-180' : '' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                @if ($show_availability)
                    <div class="bg-white border border-gray-300 rounded-lg p-4 space-y-3">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="text-xs font-semibold text-gray-600 uppercase">Jam Operasional</h4>
                            <div class="flex gap-3 text-[10px]">
                                <div class="flex items-center gap-1">
                                    <div class="w-3 h-3 bg-green-500 rounded"></div>
                                    <span class="text-gray-600">Tersedia</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <div class="w-3 h-3 bg-red-500 rounded"></div>
                                    <span class="text-gray-600">Terboking</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-4 gap-2 max-h-64 overflow-y-auto">
                            @foreach ($this->available_hours as $slot)
                                <div
                                    class="flex items-center justify-center px-3 py-2 rounded text-xs font-medium
                                    {{ $slot['is_booked'] ? 'bg-red-100 text-red-700 cursor-not-allowed' : 'bg-green-100 text-green-700' }}">
                                    {{ $slot['time'] }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-[11px] uppercase font-bold text-gray-500 mb-2 block">Jam Mulai</label>
                        <select wire:model.live="start_time"
                            class="w-full border border-gray-400 rounded px-3 py-2 text-sm text-black focus:outline-none focus:border-indigo-500">
                            <option value="">Pilih</option>
                            @for ($i = 6; $i <= 22; $i++)
                                <option value="{{ sprintf('%02d:00', $i) }}">
                                    {{ sprintf('%02d:00', $i) }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div>
                        <label class="text-[11px] uppercase font-bold text-gray-500 mb-2 block">Jam Selesai</label>
                        <select wire:model.live="end_time" {{ !$start_time ? 'disabled' : '' }}
                            class="w-full border border-gray-400 rounded px-3 py-2 text-sm text-black focus:outline-none focus:border-indigo-500 disabled:bg-gray-100 disabled:cursor-not-allowed">
                            <option value="">{{ $start_time ? 'Pilih' : 'Pilih jam mulai dulu' }}</option>
                            @foreach ($this->end_time_options as $option)
                                <option value="{{ $option['value'] }}">
                                    {{ $option['label'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="space-y-1 pt-2 border-t">
                    <p class="text-xs text-gray-500">Rincian Harga</p>
                    <div class="flex justify-between text-sm font-medium">
                        <span class="text-gray-500">
                            {{ $total_hours }} jam x
                            Rp {{ number_format($venue->price_per_hour, 0, ',', '.') }}
                        </span>
                        <span class="text-gray-700">
                            Rp {{ number_format($total_price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                <!-- Button Book -->
                <button type="submit" wire:loading.attr="disabled" @disabled(!$booking_date || !$start_time || !$end_time || $total_hours <= 0)
                    class="w-full bg-indigo-400 hover:bg-indigo-500 disabled:bg-gray-300 disabled:cursor-not-allowed
                           text-black font-bold py-4 rounded shadow-md transition-colors uppercase tracking-wider">
                    <span wire:loading.remove>Book Now</span>
                    <span wire:loading>Processing...</span>
                </button>
            </form>
        </div>
    </section>
</div>
