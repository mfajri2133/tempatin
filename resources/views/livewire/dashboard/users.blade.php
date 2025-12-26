<div class="bg-white rounded shadow-md border border-blue-100 overflow-hidden">
    <!-- Search -->
    <div class="flex justify-between items-center p-4 bg-white">
        <x-dashboard-search :placeholder="'Cari nama atau email'" />
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
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
