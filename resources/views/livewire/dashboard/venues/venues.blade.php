<div x-data="{ showDeleteModal: false }" x-on:open-delete-modal.window="showDeleteModal = true"
    x-on:close-delete-modal.window="showDeleteModal = false">

    <div class="bg-white rounded shadow-md border border-blue-100 overflow-hidden">
        <div class="flex flex-col gap-4 sm:flex-row items-center justify-between p-4 bg-white">
            <div class="relative w-full sm:w-64">
                <!-- icon -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="size-5 text-blue-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197a7.5 7.5 0 1 0-10.607-10.607 7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>

                <!-- loading -->
                <svg wire:loading wire:target="search"
                    class="size-4 animate-spin text-blue-400 absolute right-3 top-1/2 -translate-y-1/2"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
                </svg>

                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama venue..."
                    class="w-full pl-10 pr-10 py-2 text-sm rounded border border-blue-200 bg-white text-gray-700
               focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
            </div>

            <x-normal-button :href="route('dashboard.venues.create')" class="w-full sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah
            </x-normal-button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm whitespace-nowrap">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-black">Nama Venue</th>
                        <th class="px-6 py-3 text-left font-semibold text-black">Alamat</th>
                        <th class="px-6 py-3 text-center font-semibold text-black">Kapasitas</th>
                        <th class="px-6 py-3 text-center font-semibold text-black">Harga Per Jam</th>
                        <th class="px-6 py-3 text-center font-semibold text-black">Status</th>
                        <th class="px-6 py-3 text-center font-semibold text-black">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($venues as $venue)
                        <tr wire:key="venue-{{ $venue->id }}" class="hover:bg-blue-50">
                            <td class="px-6 py-4 text-xs font-medium text-gray-800">
                                {{ $venue->name }}
                            </td>

                            <td class="px-6 py-4 text-xs text-gray-600">
                                {{ $venue->address }}
                            </td>

                            <td class="px-6 py-4 text-xs text-gray-600 text-center">
                                {{ $venue->capacity }}
                            </td>

                            <td class="px-6 py-4 text-xs text-gray-600 text-center">
                                {{ $venue->price_formatted }}
                            </td>

                            <td class="px-6 py-4 text-xs text-gray-600 text-center">
                                {{ $venue->status }}
                            </td>

                            <td class="px-6 py-4 text-xs flex gap-2 justify-center">
                                <x-square-button :href="route('dashboard.venues.edit', $venue->id)"
                                    class="bg-orange-100 text-orange-600 hover:bg-orange-200 focus:ring-orange-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </x-square-button>

                                <x-square-button :href="route('dashboard.venues.show', $venue->id)"
                                    class="bg-gray-100 text-gray-600 hover:bg-gray-200 focus:ring-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </x-square-button>

                                <x-square-button wire:click="toggleStatus({{ $venue->id }})"
                                    wire:loading.attr="disabled" wire:target="toggleStatus({{ $venue->id }})"
                                    class="
                                        relative
                                        {{ $venue->status === 'available'
                                            ? 'bg-red-100 text-red-600 hover:bg-red-200 focus:ring-red-300'
                                            : 'bg-green-100 text-green-600 hover:bg-green-200 focus:ring-green-300' }}
                                    "
                                    title="{{ $venue->status === 'available' ? 'Nonaktifkan Venue' : 'Aktifkan Venue' }}">

                                    <!-- ICON NORMAL -->
                                    <span wire:loading.remove wire:target="toggleStatus({{ $venue->id }})">
                                        @if ($venue->status === 'available')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18.364 5.636 5.636 18.364M5.636 5.636l12.728 12.728" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        @endif
                                    </span>

                                    <!-- LOADING -->
                                    <span wire:loading wire:target="toggleStatus({{ $venue->id }})">
                                        <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4" />
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
                                        </svg>
                                    </span>
                                </x-square-button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                                Tidak ada data venue
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <x-modal show="showDeleteModal" title="Hapus Venue" maxWidth="sm">

        <p class="text-sm text-gray-500">
            Apakah kamu yakin ingin menghapus venue ini?
        </p>

        <x-slot:footer>
            <button @click="$dispatch('close-delete-modal')"
                class="h-10 px-4 rounded bg-gray-100 text-xs text-gray-700 hover:bg-gray-200 transition">
                Batal
            </button>

            <button wire:click="delete"
                class="h-10 px-4 rounded bg-red-600 text-white text-xs hover:bg-red-700 transition">
                Hapus
            </button>
        </x-slot:footer>
    </x-modal>
</div>
