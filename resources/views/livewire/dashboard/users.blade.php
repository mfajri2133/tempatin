<div class="p-2 sm:p-4 md:p-6">
    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full">
            <!-- Search and Add Button Row -->
            <thead>
                <tr class="bg-ptx-blue text-ptx-blue">
                    <th colspan="5" class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4">
                        <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3 sm:gap-4">
                            <!-- Search Bar -->
                            <div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3">
                                <input type="text" placeholder="Search users..." 
                                    class="w-full px-3 py-2 text-sm border border-blue-400 rounded-lg focus:ring-2 focus:ring-blue-300 focus:border-transparent bg-white placeholder:text-blue-400">
                            </div>
                            
                            <!-- Add Button -->
                            <button onclick="document.getElementById('addModal').classList.remove('hidden')" 
                                class="bg-white hover:bg-gray-100 text-blue-600 px-4 py-2 text-sm sm:text-base rounded-lg font-medium transition duration-200 whitespace-nowrap">
                                + Add User
                            </button>
                        </div>
                    </th>
                </tr>
                <!-- Table Headers -->
                <tr class="bg-ptx-blue text-ptx-white">
                    <th class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama</th>
                    <th class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium text-white uppercase tracking-wider hidden sm:table-cell">Username</th>
                    <th class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium text-white uppercase tracking-wider hidden md:table-cell">Email</th>
                    <th class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium text-white uppercase tracking-wider hidden md:table-cell">Tiket</th>
                    <th class="px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-ptx-black divide-y divide-gray-700">
                <!-- Sample User 1 -->
                <tr class="hover:bg-gray-700">
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm font-medium text-gray-100">
                        <div>John Doe</div>
                        <div class="text-ptx-white text-xs sm:hidden">johndoe</div>
                        <div class="text-ptx-white text-xs md:hidden">john.doe@example.com</div>
                        <div class="text-ptx-white text-xs md:hidden">Tiket: 12</div>
                    </td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden sm:table-cell">johndoe</td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden md:table-cell">john.doe@example.com</td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden md:table-cell">12</td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm font-medium">
                        <div class="flex flex-col sm:flex-row gap-2">
                            <button onclick="document.getElementById('editModal').classList.remove('hidden')" 
                                class="text-blue-400 hover:text-blue-300">Edit</button>
                            <button onclick="document.getElementById('deleteModal').classList.remove('hidden')" 
                                class="text-red-400 hover:text-red-300">Delete</button>
                        </div>
                    </td>
                </tr>
                <!-- Sample User 2 -->
                <tr class="hover:bg-gray-700">
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm font-medium text-gray-100">
                        <div>Jane Smith</div>
                        <div class="text-ptx-white text-xs sm:hidden">janesmith</div>
                        <div class="text-ptx-white text-xs md:hidden">jane.smith@example.com</div>
                        <div class="text-ptx-white text-xs md:hidden">Tiket: 8</div>
                    </td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden sm:table-cell">janesmith</td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden md:table-cell">jane.smith@example.com</td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden md:table-cell">8</td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm font-medium">
                        <div class="flex flex-col sm:flex-row gap-2">
                            <button onclick="document.getElementById('editModal').classList.remove('hidden')" 
                                class="text-blue-400 hover:text-blue-300">Edit</button>
                            <button onclick="document.getElementById('deleteModal').classList.remove('hidden')" 
                                class="text-red-400 hover:text-red-300">Delete</button>
                        </div>
                    </td>
                </tr>
                <!-- Sample User 3 -->
                <tr class="hover:bg-gray-700">
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm font-medium text-gray-100">
                        <div>Mike Johnson</div>
                        <div class="text-ptx-white text-xs sm:hidden">mikejohnson</div>
                        <div class="text-ptx-white text-xs md:hidden">mike.johnson@example.com</div>
                        <div class="text-ptx-white text-xs md:hidden">Tiket: 5</div>
                    </td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden sm:table-cell">mikejohnson</td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden md:table-cell">mike.johnson@example.com</td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm text-gray-300 hidden md:table-cell">5</td>
                    <td class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-4 text-xs sm:text-sm font-medium">
                        <div class="flex flex-col sm:flex-row gap-2">
                            <button onclick="document.getElementById('editModal').classList.remove('hidden')" 
                                class="text-blue-400 hover:text-blue-300">Edit</button>
                            <button onclick="document.getElementById('deleteModal').classList.remove('hidden')" 
                                class="text-red-400 hover:text-red-300">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Add User Modal -->
    <div id="addModal" class="hidden fixed inset-0 bg-black/50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Add New User</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-3 mt-5">
                        <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')" 
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-gray-600/50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Edit User</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" value="John Doe" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" value="johndoe" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" value="john.doe@example.com" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-3 mt-5">
                        <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" 
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600/50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium leading-6 text-gray-900 text-center mb-2">Delete User</h3>
                <p class="text-sm text-gray-500 text-center mb-5">Are you sure you want to delete this user? This action cannot be undone.</p>
                <div class="flex justify-center space-x-3">
                    <button type="button" onclick="document.getElementById('deleteModal').classList.add('hidden')" 
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                    <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
