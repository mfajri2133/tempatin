<div class="w-full flex justify-center px-4 py-10 to-white">
    <div class="w-full bg-white max-w-sm rounded-3xl shadow-xl p-8">

        <h1 class="text-3xl font-bold text-center mb-2 text-black">Lengkapi Profil Anda</h1>
        <p class="text-gray-600 text-m text-center mb-4">Silahkan isi data untuk melengkapi profil</p>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 text-sm rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 text-sm rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-800 mb-1">Nama</label>
                <input type="text" id="name" wire:model="name" required
                    class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-black"
                    placeholder="Nama lengkap">
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-800 mb-1">Password Baru</label>
                <input type="password" id="password" wire:model="password"
                    class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-black"
                    placeholder="Password baru">
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-800 mb-1">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" wire:model="password_confirmation"
                    class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg
                    focus:ring-2 focus:ring-blue-500 text-black"
                    placeholder="Konfirmasi password">
                @error('password_confirmation')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium">
                Simpan
            </button>

        </form>
    </div>
</div>