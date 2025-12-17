<div class="p-2 sm:p-4 md:p-6">
    <!-- Vanues Table -->
    <div class="bg-white rounded-lg shadow w-full overflow-x-auto">
        <table class="w-full table-auto border-collapse">
        <!-- Search and button add venue -->
            <thead>
                <tr class="bg-ptx-white text-ptx-blue">
                    <th colspan="5" class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <!-- Search bar -->
                            <div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3">
                                <input type="text" placeholder="Telusuri venue..." 
                                    class="w-full px-3 py-2 text-sm border border-blue-400 rounded-lg focus:ring-2 focus:ring-blue-300 focus:border-transparent bg-white placeholder:text-blue-400 text-gray-800">
                            </div>
                            
                            <!-- Button add venue -->
                            <button @click="addModal = true"
                                class="flex gap-2 items-center justify-center w-full sm:w-auto bg-ptx-blue text-ptx-white px-4 py-2 text-sm sm:text-base rounded-lg font-medium transition duration-200 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                <span>Tambah Venue</span>
                            </button>
                        </div>
                    </th>
                </tr>
                <tr class="bg-ptx-white text-ptx-blue">
                    <th class="px-4 py-2 md:px-6 text-xs uppercase text-left">Nama Venue</th>
                    <th class="hidden sm:table-cell px-3 py-2 md:px-6 text-xs uppercase text-left">Alamat</th>
                    <th class="hidden md:table-cell px-3 py-2 md:px-6 text-xs uppercase text-left">Kapasitas</th>
                    <th class="hidden lg:table-cell px-3 py-2 md:px-6 text-xs uppercase text-left">Harga Per Jam</th>
                    <th class="px-3 py-2 md:px-6 text-xs uppercase text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-ptx-black divide-y divide-gray-700">
                <tr class="hover:bg-gray-700">
                    <td class="px-4 py-2 sm:px-4 md:px-6 text-xs sm:text-sm font-medium text-gray-100">
                        <div class="space-y-1">
                            <div class=>Grand Hall Center</div>
                            <div class="text-gray-300 text-xs sm:hidden">Jl. Sudirman No. 12, Jakarta</div>
                            <div class="text-gray-300 text-xs sm:hidden">Capacity: 500</div>
                            <div class="text-gray-300 text-xs sm:hidden">Rp 2.500.000 / jam</div>
                        </div>
                    </td>
                    <td class="hidden sm:table-cell px-3 py-3 text-gray-300">Jl. Sudirman No. 12, Jakarta</td>
                    <td class="hidden md:table-cell px-3 py-3 text-gray-300">500</td>
                    <td class="hidden lg:table-cell px-3 py-3 text-gray-300">Rp 2.500.000</td>
                    <td class="px-3 py-3 sm:px-4 md:px-6 text-sm font-medium text-center">
                        <div class="flex justify-center gap-2">
                            <button @click="editModal = true" 
                                class="px-2 py-2 bg-ptx-blue rounded-lg text-ptx-white hover:text-blue-300 text-xs sm:text-sm whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button @click="deleteModal = true"
                                class="px-2 py-2 bg-red-600 rounded-lg text-ptx-white hover:text-red-300 text-xs sm:text-sm whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-show="addModal" x-transition @click.away="addModal = false" @keydown.escape.window="addModal = false"
    class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center"id="addModal">
        <div class="relative mx-auto p-5 border w-full max-w-sm shadow-lg rounded-md bg-white my-8">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Tambah Venue Baru</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Venue</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kapasitas</label>
                        <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Harga Per Jam</label>
                        <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" @click="addModal = false"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan Venue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-ptx-black/50 overflow-y-auto h-full w-full z-50 flex min-h-screen items-center justify-center">
        <div class="relative p-5 border w-96 shadow-lg rounded-md bg-white">
             <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Edit Venue</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Venue</label>
                        <input type="text"class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <input type="text"class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kapasitas</label>
                        <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Harga Per Jam</label>
                        <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" 
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete modal -->
    <div id="deletemodal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium leading-6 text-gray-900 text-center mb-2">Hapus User</h3>
                <p class="text-sm text-gray-500 text-center mb-5">Apakah kamu yakin akan menghapus venue ini</p>
                <div class="flex justify-center space-x-3">
                    <button type="button" onclick="document.getElementById('deleteModal').classList.add('hidden')" 
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
                    <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>