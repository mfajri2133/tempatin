<div class="min-h-[calc(100vh-64px)] bg-indigo-50">
    <section class="max-w-3xl mx-auto px-6 py-12">
        <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
            <div class="bg-indigo-400 p-5">
                <h1 class="text-xl md:text-2xl font-bold text-black">Review Booking</h1>
                <p class="text-sm text-black/80 mt-1">Pastikan detail booking sudah benar sebelum lanjut.</p>
            </div>

            <div class="p-6 space-y-6 text-black">
                <div class="space-y-1">
                    <p class="text-xs uppercase font-bold text-gray-500">Venue</p>
                    <p class="text-lg font-semibold">{{ $venue->name }}</p>
                </div>

                <div class="border rounded-lg p-4">
                    <p class="text-xs uppercase font-bold text-gray-500">Alamat</p>
                    <p class="text-sm font-medium mt-1">
                        {{ $venue->address }}
                        @if (!empty($venue->city_name))
                            , {{ $venue->city_name }}
                        @endif
                    </p>
                </div>

                <div class="border rounded-lg p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase">Kapasitas</p>
                            <p class="text-sm font-medium mt-1">{{ $venue->capacity }} Orang</p>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase">Kategori</p>
                            <p class="text-sm font-medium mt-1">{{ $venue->category->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="border rounded-lg p-4">
                        <p class="text-xs uppercase font-bold text-gray-500">Tanggal Booking</p>
                        <p class="text-sm font-medium mt-1">{{ $booking_date }}</p>
                    </div>

                    <div class="border rounded-lg p-4">
                        <p class="text-xs uppercase font-bold text-gray-500">Jam Booking</p>
                        <p class="text-sm font-medium mt-1">{{ $start_time }} - {{ $end_time }}</p>
                    </div>
                </div>

                <div class="border rounded-lg p-4">
                    <p class="text-xs uppercase font-bold text-gray-500">Rincian Harga</p>
                    <div class="flex items-center justify-between text-sm mt-2">
                        <span class="text-gray-600">
                            {{ $total_hours }} jam x Rp{{ number_format($venue->price_per_hour, 0, ',', '.') }}
                        </span>
                        <span class="font-semibold text-gray-800">
                            Rp{{ number_format($total_price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                <form wire:submit.prevent="confirmBooking" class="pt-2">
                    <button type="submit" wire:loading.attr="disabled" @disabled(!$booking_date || !$start_time || !$end_time)
                        class="w-full bg-indigo-400 hover:bg-indigo-500 disabled:bg-gray-300 text-black font-bold py-4 rounded shadow-md transition-colors uppercase tracking-wider">
                        <span wire:loading.remove>Lanjutkan Booking</span>
                        <span wire:loading>Processing...</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>
