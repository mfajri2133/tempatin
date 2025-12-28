<div class="space-y-6">
    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-tp-black">Dashboard</h1>
            <p class="text-sm text-gray-500 mt-1">Overview statistik dan transaksi</p>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <div class="flex items-center gap-2">
                <input type="date" wire:model.live="start_date"
                    class="px-3 py-1.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <span class="text-gray-400">—</span>
                <input type="date" wire:model.live="end_date"
                    class="px-3 py-1.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <button wire:click="exportReport" wire:loading.attr="disabled"
                class="px-4 py-1.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition disabled:opacity-60 flex items-center gap-2">
                <svg wire:loading.remove class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <svg wire:loading class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span wire:loading.remove>Export</span>
                <span wire:loading>Exporting...</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div class="bg-white rounded-lg border border-gray-200 p-5 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Venue</p>
                    <p class="text-3xl font-bold text-tp-black mt-2">{{ number_format($totalVenues, 0, ',', '.') }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg border border-gray-200 p-5 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Pendapatan</p>
                    <p class="text-2xl font-bold text-tp-black mt-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg border border-gray-200 p-5 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total User</p>
                    <p class="text-3xl font-bold text-tp-black mt-2">{{ number_format($totalUsers, 0, ',', '.') }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg border border-gray-200 p-5 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Admin</p>
                    <p class="text-3xl font-bold text-tp-black mt-2">{{ number_format($totalAdmins, 0, ',', '.') }}</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-bold text-tp-black">Grafik Transaksi</h2>
            <span class="text-xs text-gray-500">
                {{ $start_date ? \Carbon\Carbon::parse($start_date)->format('d M Y') : 'All time' }} -
                {{ $end_date ? \Carbon\Carbon::parse($end_date)->format('d M Y') : 'Now' }}
            </span>
        </div>

        @php
            $maxValue = collect($chartData)->max('value') ?: 1;
        @endphp

        <div class="grid gap-2 h-48" style="grid-template-columns: repeat({{ count($chartData) }}, minmax(0, 1fr));">
            @foreach ($chartData as $point)
                @php
                    $height = $maxValue > 0 ? (int) round(($point['value'] / $maxValue) * 100) : 0;
                @endphp

                <div class="flex flex-col items-center justify-end gap-2 h-full group">
                    <div class="relative w-full">
                        <div class="w-full rounded-t bg-indigo-100 border border-indigo-200 hover:bg-indigo-200 transition-colors cursor-pointer"
                            style="height: {{ $height }}%">
                        </div>
                        <div
                            class="absolute -top-6 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-900 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            {{ $point['value'] }}
                        </div>
                    </div>
                    <div class="text-[10px] text-gray-500 text-center">{{ $point['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-tp-black mb-4">Transaksi Terbaru</h2>

            @if ($recentTransactions->isEmpty())
                <p class="text-sm text-gray-500 text-center py-8">Belum ada transaksi</p>
            @else
                <div class="space-y-3">
                    @foreach ($recentTransactions as $transaction)
                        <div
                            class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-tp-black truncate">
                                    {{ $transaction->booking->venue->name ?? 'N/A' }}
                                </p>
                                <p class="text-xs text-gray-500 mt-0.5">
                                    {{ $transaction->user->name ?? 'N/A' }} •
                                    {{ $transaction->created_at->format('d M Y') }}
                                </p>
                            </div>
                            <div class="text-right ml-3">
                                <p class="text-sm font-bold text-tp-black">
                                    Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}
                                </p>
                                <span
                                    class="inline-block px-2 py-0.5 text-xs font-medium rounded {{ $transaction->status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-tp-black mb-4">Venue Terpopuler</h2>

            @if ($topVenues->isEmpty())
                <p class="text-sm text-gray-500 text-center py-8">Belum ada data booking</p>
            @else
                <div class="space-y-3">
                    @foreach ($topVenues as $index => $item)
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                <span class="text-sm font-bold text-indigo-600">#{{ $index + 1 }}</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-tp-black truncate">
                                    {{ $item->venue->name ?? 'N/A' }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $item->total_bookings }} booking
                                </p>
                            </div>
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
