<div class="min-h-[calc(100vh-64px)] bg-gradient-to-br from-indigo-50 via-white to-purple-50 py-12">
    <section class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 mb-6">
            <div class="bg-gradient-to-r from-indigo-500 via-indigo-600 to-purple-600 px-6 py-8 sm:px-8">
                <div class="flex items-start gap-4">
                    <div
                        class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white">Review Booking</h1>
                        <p class="text-indigo-100 mt-2 text-sm sm:text-base">Periksa kembali detail booking sebelum
                            melanjutkan pembayaran</p>
                    </div>
                </div>
            </div>

            <div class="p-6 sm:p-8 space-y-6">

                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-6 border border-indigo-100">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-14 h-14 bg-indigo-500 rounded-lg flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-indigo-600 uppercase tracking-wide mb-1">Venue</p>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">{{ $venue->name }}</h2>
                            <div class="flex items-start gap-2 mt-3 text-gray-600">
                                <svg class="w-5 h-5 text-indigo-500 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="text-sm leading-relaxed">
                                    {{ $venue->address }}@if (!empty($venue->city_name))
                                        , <span class="font-medium">{{ $venue->city_name }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div
                        class="bg-white rounded-xl p-5 border border-gray-200 hover:border-indigo-300 transition-colors">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Kapasitas</p>
                        </div>
                        <p class="text-2xl font-bold text-gray-900">{{ $venue->capacity }} <span
                                class="text-base font-normal text-gray-600">Orang</span></p>
                    </div>

                    <div
                        class="bg-white rounded-xl p-5 border border-gray-200 hover:border-purple-300 transition-colors">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Kategori</p>
                        </div>
                        <p class="text-2xl font-bold text-gray-900">{{ $venue->category->name }}</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                    <div class="bg-gray-50 px-5 py-3 border-b border-gray-200">
                        <h3 class="text-sm font-bold text-gray-700 uppercase tracking-wide flex items-center gap-2">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Detail Booking
                        </h3>
                    </div>
                    <div class="p-5 space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Tanggal
                                    </p>
                                    <p class="text-base font-bold text-gray-900">{{ $booking_date }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div
                                    class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Waktu
                                    </p>
                                    <p class="text-base font-bold text-gray-900">{{ $start_time }} -
                                        {{ $end_time }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl p-6 text-white shadow-lg">
                    <h3 class="text-sm font-bold uppercase tracking-wide mb-4 flex items-center gap-2 opacity-90">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                            </path>
                        </svg>
                        Rincian Biaya
                    </h3>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between pb-3 border-b border-white/20">
                            <div>
                                <p class="text-white/90 text-sm">Tarif per jam</p>
                                <p class="text-xs text-white/70 mt-0.5">{{ $total_hours }} jam ×
                                    Rp{{ number_format($venue->price_per_hour, 0, ',', '.') }}</p>
                            </div>
                            <p class="text-lg font-semibold">Rp{{ number_format($total_price, 0, ',', '.') }}</p>
                        </div>

                        <div class="flex items-center justify-between pt-2">
                            <p class="text-lg font-bold">Total Pembayaran</p>
                            <p class="text-3xl font-bold">Rp{{ number_format($total_price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <form wire:submit.prevent="confirmBooking" class="pt-2">
                    <button type="submit" wire:loading.attr="disabled" @disabled(!$booking_date || !$start_time || !$end_time)
                        class="group w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 disabled:from-gray-300 disabled:to-gray-400 text-white font-bold py-5 rounded-xl shadow-lg hover:shadow-xl disabled:shadow-none transition-all duration-300 uppercase tracking-wider text-base sm:text-lg flex items-center justify-center gap-3 relative overflow-hidden">

                        <span
                            class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 transform -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>

                        <span wire:loading.remove>
                            Lanjutkan ke Pembayaran
                        </span>

                        <span wire:loading>
                            Memproses...
                        </span>
                    </button>
                </form>

                <div class="flex items-start gap-3 bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="text-sm text-blue-800">
                        <p class="font-semibold mb-1">Informasi Penting</p>
                        <p class="text-blue-700">Setelah klik tombol di atas, Anda akan diarahkan ke halaman
                            pembayaran. Pastikan semua informasi sudah benar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div