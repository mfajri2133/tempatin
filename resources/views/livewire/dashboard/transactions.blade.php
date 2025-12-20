<div class="bg-white rounded shadow-md border border-blue-100 overflow-hidden">
    <!-- Search Bar -->
    <div class="p-4 bg-white border-b border-blue-100">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3">
            <div class="relative w-full sm:flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5 text-blue-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>

                <input type="text" name="q" placeholder="Cari nama, email, atau kode order"
                    class="w-full pl-10 pr-3 py-2 text-sm rounded border border-blue-200 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
            </div>

            @php
                $statusOptions = method_exists($transactions, 'getCollection')
                    ? $transactions->getCollection()->pluck('status')->filter()->unique()->values()
                    : collect();
            @endphp
            <div class="w-full sm:w-56">
                <select name="status"
                    class="w-full px-3 py-2 text-sm rounded border border-blue-200 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                    <option value="">Semua status</option>
                    @foreach ($statusOptions as $status)
                        <option value="{{ $status }}">{{ ucfirst(str_replace('_', ' ', $status)) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm whitespace-nowrap">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold">Kode Order</th>
                    <th class="px-6 py-3 text-left font-semibold">Pengguna</th>
                    <th class="px-6 py-3 text-left font-semibold">Venue</th>
                    <th class="px-6 py-3 text-right font-semibold">Total</th>
                    <th class="px-6 py-3 text-center font-semibold">Pembayaran</th>
                    <th class="px-6 py-3 text-center font-semibold">Tanggal</th>
                    <th class="px-6 py-3 text-center font-semibold">Status</th>
                    <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-blue-100">
                @forelse ($transactions as $transaction)
                    <tr class="hover:bg-blue-50/70 transition">
                        <td class="px-6 py-4 text-xs font-medium text-gray-800">
                            {{ $transaction->order_code }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-700">
                            <div class="font-medium text-gray-800">{{ $transaction->user?->name ?? '-' }}</div>
                            <div class="text-gray-500">{{ $transaction->user?->email ?? '-' }}</div>
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-600">
                            {{ $transaction->booking?->venue?->name ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-800 text-right">
                            Rp {{ number_format((float) $transaction->total_amount, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-700 text-center">
                            {{ $transaction->payment?->payment_status ? ucfirst(str_replace('_', ' ', $transaction->payment->payment_status)) : '-' }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-600 text-center">
                            {{ optional($transaction->created_at)->format('d-m-Y') ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-700 text-center">
                            {{ $transaction->status ? ucfirst(str_replace('_', ' ', $transaction->status)) : '-' }}
                        </td>

                        <td class="px-6 py-4 text-xs flex gap-2 justify-center">
                            <x-square-button
                                class="bg-orange-100 text-orange-600 hover:bg-orange-200 focus:ring-orange-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </x-square-button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-6 text-center text-gray-500">
                            Tidak ada data transaksi
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if (method_exists($transactions, 'links'))
        <div class="p-4 border-t border-blue-100">
            {{ $transactions->links() }}
        </div>
    @endif
</div>
