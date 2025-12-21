<div x-data="{ showAddModal: false, showDeleteModal: false }" x-on:open-add-modal.window="showAddModal = true"
    x-on:close-add-modal.window="showAddModal = false" x-on:open-delete-modal.window="showDeleteModal = true"
    x-on:close-delete-modal.window="showDeleteModal = false">

    <div class="bg-white rounded shadow-md border border-blue-100 overflow-hidden">
        <!-- SEARCH -->
        <div class="flex flex-col gap-4 sm:flex-row items-center justify-between p-4 bg-white">
            <div class="relative w-full sm:w-64">
                <!-- icon -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="size-5 text-blue-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197a7.5 7.5 0 1 0-10.607-10.607 7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>

                <!-- clear -->
                @if ($search)
                    <button wire:click="$set('search','')"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-blue-400 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                @endif

                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama atau email"
                    class="w-full pl-10 pr-10 py-2 text-sm rounded border border-blue-200 bg-white text-gray-700
                           focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
            </div>

            <!-- ADD BUTTON -->
            <x-normal-button wire:click="create" class="w-full sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah
            </x-normal-button>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-black">
                            Nama
                        </th>
                        <th class="px-6 py-3 text-left font-semibold text-black">
                            Email
                        </th>
                        <th class="px-6 py-3 text-center font-semibold text-black">
                            Tanggal Daftar
                        </th>
                        <th class="px-6 py-3 text-center font-semibold text-black">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-blue-100">
                    @forelse ($users as $user)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4 text-xs font-medium text-gray-800">
                                {{ $user->name }}
                            </td>

                            <td class="px-6 py-4 text-xs text-gray-600">
                                {{ $user->email }}
                            </td>

                            <td class="px-6 py-4 text-xs text-center text-gray-600">
                                {{ $user->created_at->format('d-m-Y') }}
                            </td>

                            <td class="px-6 py-4 text-xs flex gap-2 justify-center">
                                <x-square-button wire:click="edit({{ $user->id }})"
                                    class="bg-orange-100 text-orange-600 hover:bg-orange-200 focus:ring-orange-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </x-square-button>

                                <x-square-button wire:click="confirmDelete({{ $user->id }})"
                                    class="bg-red-100 text-red-600 hover:bg-red-200 focus:ring-red-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </x-square-button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                Tidak ada data admin
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- ADD MODAL -->
    <x-modal show="showAddModal" :title="$isEdit ? 'Edit Admin' : 'Tambah Admin'">

        <form wire:submit.prevent="save" class="space-y-4" autocomplete="off">

            <!-- NAMA -->
            <div class="space-y-1">
                <label class="text-sm font-medium text-gray-700">
                    Nama
                </label>
                <input type="text" wire:model.live.debounce.300ms="name" placeholder="Masukkan nama"
                    class="w-full h-10 px-3 text-sm rounded-md
                       border border-gray-300
                       bg-white text-gray-900
                       placeholder:text-gray-400
                       focus:outline-none
                       focus:border-blue-500
                       focus:ring-1 focus:ring-blue-500
                       transition
                       @error('name') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" />
                @error('name')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- EMAIL -->
            <div class="space-y-1">
                <label class="text-sm font-medium text-gray-700">
                    Email
                </label>
                <input type="email" wire:model.live.debounce.300ms="email" autocomplete="new-email"
                    placeholder="Masukkan email"
                    class="w-full h-10 px-3 text-sm rounded-md
                       border border-gray-300
                       bg-white text-gray-900
                       placeholder:text-gray-400
                       focus:outline-none
                       focus:border-blue-500
                       focus:ring-1 focus:ring-blue-500
                       transition
                       @error('email') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" />
                @error('email')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="space-y-1">
                <label class="text-sm font-medium text-gray-700">
                    Password
                    @if ($isEdit)
                        <span class="text-xs text-gray-400">
                            (kosongkan jika tidak diubah)
                        </span>
                    @endif
                </label>
                <input type="password" wire:model.live.debounce.300ms="password" autocomplete="new-password"
                    placeholder="Masukkan password"
                    class="w-full h-10 px-3 text-sm rounded-md
                       border border-gray-300
                       bg-white text-gray-900
                       placeholder:text-gray-400
                       focus:outline-none
                       focus:border-blue-500
                       focus:ring-1 focus:ring-blue-500
                       transition
                       @error('password') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" />
                @error('password')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

        </form>

        <x-slot:footer>
            <button type="button" @click="$dispatch('close-add-modal')"
                class="h-9 px-4 text-xs rounded-md
                   border border-gray-300
                   bg-gray-100 text-gray-700
                   hover:bg-gray-200 transition">
                Batal
            </button>

            <button type="button" wire:click="save"
                class="h-9 px-4 text-xs rounded-md
                   bg-blue-600 text-white
                   hover:bg-blue-700
                   focus:outline-none
                   focus:ring-2 focus:ring-blue-500 focus:ring-offset-1
                   transition">
                {{ $isEdit ? 'Update' : 'Simpan' }}
            </button>
        </x-slot:footer>
    </x-modal>

    <!-- DELETE MODAL -->
    <x-modal show="showDeleteModal" title="Hapus Admin" maxWidth="sm">

        <p class="text-sm text-gray-500">
            Apakah kamu yakin ingin menghapus admin ini?
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
