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
                        $statusRaw = $order->payment?->payment_status ?? $order->status;
                        $statusText = $statusRaw ? ucfirst(str_replace('_', ' ', $statusRaw)) : '-';

                        $badgeClass = 'bg-gray-100 text-gray-700';
                        $statusKey = strtolower((string) $statusRaw);
                        if (in_array($statusKey, ['paid', 'settlement', 'capture', 'success'], true)) {
                            $badgeClass = 'bg-green-100 text-green-700';
                        } elseif (in_array($statusKey, ['pending', 'process', 'processing'], true)) {
                            $badgeClass = 'bg-yellow-100 text-yellow-800';
                        } elseif (
                            in_array($statusKey, ['failed', 'expire', 'expired', 'cancel', 'canceled', 'deny'], true)
                        ) {
                            $badgeClass = 'bg-red-100 text-red-700';
                        }

                        $bookingCode = $order->booking?->booking_code ?? ($order->order_code ?? '-');
                        $venueName = $order->booking?->venue?->name;
                        $venueCity = $order->booking?->venue?->city_name;
                        $venueText = $venueName ? trim($venueName . ($venueCity ? ' · ' . $venueCity : '')) : '-';

                        $amount = $order->total_amount ?? $order->booking?->total_price;
                    @endphp

                    <div class="bg-tp-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">
                            <div>
                                <div class="text-xs uppercase tracking-wide text-tp-black">Booking Code</div>
                                <div class="text-sm font-semibold text-tp-black">{{ $bookingCode }}</div>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $badgeClass }}">
                                    {{ $statusText }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <div class="text-xs uppercase tracking-wide text-tp-black">Tanggal Order</div>
                                <div class="text-sm font-medium text-tp-black">
                                    {{ optional($order->created_at)->format('d-m-Y') ?? '-' }}
                                </div>
                            </div>

                            <div>
                                <div class="text-xs uppercase tracking-wide text-tp-black">Tempat</div>
                                <div class="text-sm font-medium text-tp-black">{{ $venueText }}</div>
                            </div>

                            <div>
                                <div class="text-xs uppercase tracking-wide text-tp-black">Jumlah</div>
                                <div class="text-sm font-semibold text-tp-black">
                                    @if (!is_null($amount))
                                        Rp {{ number_format((float) $amount, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
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
                <p class="text-tp-white text-lg">Belum ada histori transaksi</p>
            </div>
        @endif
    </div>
</div>
