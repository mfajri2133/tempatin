<div class="p-2 sm:p-4 md:p-6" x-data="{ showAddModal: false, showDeleteModal: false }">
    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full">
            <!-- Search -->
            <thead>
                <tr class="bg-ptx-white text-ptx-blue">
                    <th colspan="3" class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4">
                        <div
                            class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3 sm:gap-4">
                            <!-- Search Bar -->
                            <div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3">
                                <input type="text" placeholder="Search users..."
                                    class="w-full px-3 py-2 text-sm border border-blue-400 rounded-lg focus:ring-2 focus:ring-blue-300 focus:border-transparent bg-white placeholder:text-blue-400">
                            </div>
                        </div>
                    </th>
                </tr>
                <!-- Table Headers -->
                <tr class="bg-ptx-white text-ptx-blue">
                    <th
                        class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Nama</th>
                    <th
                        class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider hidden md:table-cell">
                        Email</th>
                    <th
                        class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider hidden md:table-cell">
                        Tanggal Daftar</th>
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
                </tr>
            </tbody>
        </table>
    </div>
</div>
