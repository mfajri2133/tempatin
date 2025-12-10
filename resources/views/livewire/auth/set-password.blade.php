<div class="w-full max-w-md">
    <h2 class="text-xl font-semibold mb-4">Lengkapi Profil Anda</h2>

    <form wire:submit.prevent="save" class="space-y-4">

        {{-- Nama --}}
        <div>
            <label class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" wire:model="name" class="w-full px-4 py-2 border rounded" placeholder="Nama lengkap">
            @error('name')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password Baru --}}
        <div>
            <label class="block text-sm font-medium mb-1">Password Baru</label>
            <input type="password" wire:model="password" class="w-full px-4 py-2 border rounded"
                placeholder="Password baru">
            @error('password')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div>
            <label class="block text-sm font-medium mb-1">Konfirmasi Password</label>
            <input type="password" wire:model="password_confirmation" class="w-full px-4 py-2 border rounded"
                placeholder="Konfirmasi password">
        </div>

        <button class="w-full bg-blue-600 text-white py-2 rounded">
            Simpan
        </button>
    </form>
</div>
