<div class="bg-white rounded shadow-md border border-blue-100 overflow-hidden">
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
                        <td colspan="7" class="px-6 py-6 text-center text-gray-500">
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
