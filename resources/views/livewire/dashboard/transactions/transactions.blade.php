<div class="bg-white rounded shadow-md border border-blue-100 overflow-hidden">
    <!-- Search Bar -->
    <div class="p-4 bg-white border-b border-blue-100">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3">
            <x-dashboard-search :placeholder="'Cari nama, email, atau kode order'" />

            <div class="w-full sm:w-60">
                <select wire:model.live="status"
                    class="w-full px-3 py-[9px] text-sm rounded border border-blue-200 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                    <option value="">Semua status</option>
                    @foreach ($statusOptions as $status)
                        <option value="{{ $status }}">
                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-6 py-3 font-semibold text-center">Kode Order</th>
                    <th class="px-6 py-3 text-left font-semibold">Pengguna</th>
                    <th class="px-6 py-3 text-left font-semibold">Venue</th>
                    <th class="px-6 py-3 text-right font-semibold">Total</th>
                    <th class="px-6 py-3 text-center font-semibold">Tanggal</th>
                    <th class="px-6 py-3 text-center font-semibold">Status</th>
                    <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse ($transactions as $transaction)
                    <tr class="hover:bg-blue-50/70 transition">
                        <td class="px-6 py-4 text-xs text-center font-medium text-gray-800 min-w-[150px]">
                            {{ $transaction->order_code }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-600">
                            <div class="font-medium">{{ $transaction->user?->name ?? '-' }}</div>
                            <div class="text-gray-500">{{ $transaction->user?->email ?? '-' }}</div>
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-600">
                            {{ $transaction->booking?->venue?->name ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-600 text-right min-w-[150px]">
                            Rp {{ number_format((float) $transaction->total_amount, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-600 text-center min-w-[150px]">
                            {{ optional($transaction->created_at)->format('d-m-Y') ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-600 text-center">
                            {{ $transaction->status ? ucfirst(str_replace('_', ' ', $transaction->status)) : '-' }}
                        </td>

                        <td class="px-6 py-4 text-xs flex gap-2 justify-center">
                            <x-square-button :href="route('dashboard.transactions.show', $transaction->id)"
                                class="bg-gray-100 text-gray-600 hover:bg-gray-200 focus:ring-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
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
    <div class="m-6 flex justify-center sm:justify-end">
        {{ $transactions->links('components.pagination', ['color' => 'blue']) }}
    </div>
</div>
