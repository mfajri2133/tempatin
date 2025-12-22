<div class="bg-tp-black min-h-screen">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6">
        <div class="mb-6">
            <h1 class="text-xl sm:text-2xl font-bold text-tp-white">Histori Transaksi</h1>
            <p class="text-sm text-tp-white/75 mt-1">Daftar transaksi terbaru Anda.</p>
        </div>

        @if ($orders->count() > 0)
            <div class="space-y-4">
                @foreach ($orders as $order)
                    @php
                        $statusBadge = $this->getStatusBadge($order);
                        $bookingInfo = $this->getBookingInfo($order);
                        $amount = $order->total_amount;
                    @endphp

                    <div
                        class="bg-tp-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6 hover:shadow-md transition-shadow">
                        <div
                            class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 pb-4 border-b border-gray-100">
                            <div>
                                <div class="text-xs uppercase tracking-wide text-gray-500 font-medium">Kode Booking</div>
                                <div class="text-base font-bold text-tp-black mt-1">{{ $bookingInfo['code'] }}</div>
                            </div>

                            <div class="flex flex-col items-start sm:items-end gap-2">
                                <span
                                    class="text-xs font-semibold px-3 py-1.5 rounded-full {{ $statusBadge['class'] }}">
                                    {{ $statusBadge['text'] }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <div class="text-xs uppercase tracking-wide text-gray-500 font-medium mb-1">Tanggal
                                    Order</div>
                                <div class="text-sm font-semibold text-tp-black">
                                    {{ optional($order->created_at)->format('d M Y') ?? '-' }}
                                </div>
                            </div>

                            <div>
                                <div class="text-xs uppercase tracking-wide text-gray-500 font-medium mb-1">Venue</div>
                                <div class="text-sm font-semibold text-tp-black">{{ $bookingInfo['venue'] }}</div>
                            </div>

                            <div>
                                <div class="text-xs uppercase tracking-wide text-gray-500 font-medium mb-1">Jadwal Sewa
                                </div>
                                <div class="text-sm font-semibold text-tp-black">{{ $bookingInfo['date'] }}</div>
                                @if ($bookingInfo['time'])
                                    <div class="text-xs text-gray-500 mt-0.5">{{ $bookingInfo['time'] }}</div>
                                @endif
                            </div>

                            <div>
                                <div class="text-xs uppercase tracking-wide text-gray-500 font-medium mb-1">Total
                                    Pembayaran</div>
                                <div class="text-sm font-bold text-tp-black">
                                    @if (!is_null($amount))
                                        Rp {{ number_format((float) $amount, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100 flex justify-end gap-2">
                            @if (in_array($statusBadge['key'], ['pending', 'waiting'], true))
                                <x-normal-button href="{{ route('user.profile') }}"
                                    class="text-xs font-medium text-blue-600 hover:text-blue-700 px-3 py-1.5 rounded border border-blue-600 hover:bg-blue-50 transition-colors bg-transparent">
                                    Bayar Sekarang
                                </x-normal-button>
                            @endif

                            <x-normal-button href="{{ route('transaction-histories.show', $order->id) }}"
                                class="text-xs font-medium text-tp-black hover:text-gray-700 px-3 py-1.5 rounded border border-gray-300 hover:bg-gray-50 transition-colors bg-transparent">
                                Lihat Detail
                            </x-normal-button>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (method_exists($orders, 'links'))
                <div class="mt-8">
                    {{ $orders->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-20">
                <svg class="mx-auto h-12 w-12 text-tp-white/50 mb-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <p class="text-tp-white text-lg font-medium">Belum ada histori transaksi</p>
                <p class="text-tp-white/75 text-sm mt-2">Transaksi Anda akan muncul di sini</p>
            </div>
        @endif
    </div>
</div>
