<div class="bg-white rounded shadow-md border border-blue-100 overflow-hidden">
    <!-- Search -->
    <div class="flex justify-between items-center p-4 bg-white">
        <div class="relative w-full sm:w-64">
            <!-- icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor"
                class="size-5 text-blue-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>

            <!-- Clear -->
            @if ($search)
                <button type="button" wire:click="$set('search','')"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-blue-400 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            @endif

            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama atau email"
                class="w-full pl-10 pr-10 py-2 text-sm rounded border border-blue-200 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm whitespace-nowrap">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold">
                        Nama
                    </th>
                    <th class="px-6 py-3 text-left font-semibold">
                        Email
                    </th>
                    <th class="px-6 py-3 text-center font-semibold">
                        Tanggal Daftar
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-blue-100">
                @forelse ($users as $user)
                    <tr class="hover:bg-blue-50/70 transition">
                        <td class="px-6 py-4 text-xs font-medium text-gray-800">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-600">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-600 text-center">
                            {{ $user->created_at->format('d-m-Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-6 text-center text-gray-500">
                            Tidak ada data pengguna
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
