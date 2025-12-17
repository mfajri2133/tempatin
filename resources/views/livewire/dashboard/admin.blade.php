<div class="p-2 sm:p-4 md:p-6" x-data="{ showAddModal: false, showDeleteModal: false }">
    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full">
            <!-- Search and Add Button Row -->
            <thead>
                <tr class="bg-white text-ptx-blue">
                    <th colspan="3" class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4">
                        <div
                            class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3 sm:gap-4">
                            <!-- Search Bar -->
                            <div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3">
                                <input type="text" placeholder="Search users..."
                                    class="w-full px-3 py-2 text-sm border border-blue-400 rounded-lg focus:ring-2 focus:ring-blue-300 focus:border-transparent bg-white placeholder:text-blue-400">
                            </div>

                            <!-- Add Button -->
                            <button @click="showAddModal = true"
                                class="bg-ptx-blue text-white px-4 py-2 text-sm sm:text-base rounded-lg font-medium transition duration-200 whitespace-nowrap flex gap-2 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </th>
                </tr>
                <!-- Table Headers -->
                <tr class="bg-white text-ptx-blue">
                    <th
                        class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Nama</th>
                    <th
                        class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider hidden md:table-cell">
                        Email</th>
                    <th
                        class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider hidden md:table-cell">
                        Tanggal Daftar</th>
                    <th
                        class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider">
                    </th>
                </tr>
            </thead>
            <tbody class="bg-ptx-black divide-y divide-gray-700">
                <!-- Sample User 1 -->
                <tr class="hover:bg-gray-700">
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm font-medium text-gray-100">
                        <div>John Doe</div>
                        <div class="text-ptx-white text-xs md:hidden">john.doe@example.com</div>
                    </td>
                    <td
                        class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden md:table-cell">
                        john.doe@example.com</td>
                    <td
                        class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden md:table-cell">
                        11-12-2023</td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm font-medium">
                        <div class="flex justify-center">
                            <button @click="showDeleteModal = true"
                                class="bg-red-600 px-4 py-2 text-sm sm:text-base rounded-lg transition duration-200"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Add User Modal -->
    <div x-show="showAddModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
        style="display: none;">
        <div class="relative p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Tambah Admin</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-3 mt-5">
                        <button type="button" @click="showAddModal = false"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div x-show="showDeleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
        style="display: none;">
        <div class="relative p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium leading-6 text-gray-900 text-center mb-2">Hapus Admin</h3>
                <p class="text-sm text-gray-500 text-center mb-5">Apakah kamu yakin ingin menghapus admin ini? Tindakan
                    ini tidak dapat dibatalkan.</p>
                <div class="flex justify-center space-x-3">
                    <button type="button" @click="showDeleteModal = false"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
                    <button type="button"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
