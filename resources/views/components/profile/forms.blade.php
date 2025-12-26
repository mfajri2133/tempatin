<div class="grid grid-cols-1 gap-4 p-0 sm:p-6">
    <div class="bg-white shadow-md border border-indigo-100 overflow-hidden p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Profil</h3>
        <form wire:submit.prevent="saveProfile" class="space-y-5">
            <x-image-upload wireModel="photo" label="Foto Profil" type="profile" :preview="$user->avatar ? asset('storage/' . $user->avatar) : null" :allow-delete="true" />

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama
                </label>
                <x-input wire:model.defer="name" required />
                @error('name')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                    <span class="text-xs text-gray-500">
                        (Email tidak dapat diubah)
                    </span>
                </label>
                <x-input type="email" wire:model.defer="email" disabled
                    class="bg-gray-100 text-gray-500 cursor-not-allowed opacity-75" />
            </div>

            <div class="pt-4">
                <button type="submit" wire:loading.attr="disabled" wire:target="saveProfile, photo"
                    class="w-full h-10 bg-indigo-600 hover:bg-[#93BFEF]
                                text-white text-sm font-medium
                                rounded-md transition
                                disabled:opacity-60 disabled:cursor-not-allowed">

                    <span wire:loading.remove wire:target="saveProfile, photo">
                        SIMPAN PERUBAHAN
                    </span>
                    <span wire:loading wire:target="saveProfile, photo">
                        Menyimpan...
                    </span>
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white shadow-md border border-indigo-100 overflow-hidden p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ubah Kata Sandi</h3>
        <form wire:submit.prevent="updatePassword" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kata Sandi Saat Ini
                </label>
                <x-input type="password" wire:model.defer="current_password" required />
                @error('current_password')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kata Sandi Baru
                </label>
                <x-input type="password" wire:model.defer="new_password" required />
                @error('new_password')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Konfirmasi Kata Sandi
                </label>
                <x-input type="password" wire:model.defer="new_password_confirmation" required />
                @error('new_password_confirmation')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit" wire:loading.attr="disabled" wire:target="updatePassword"
                    class="w-full h-10 bg-indigo-600 hover:bg-[#93BFEF]
                                text-white text-sm font-medium
                                rounded-md transition
                                disabled:opacity-60 disabled:cursor-not-allowed">

                    <span wire:loading.remove wire:target="updatePassword">
                        UBAH KATA SANDI
                    </span>
                    <span wire:loading wire:target="updatePassword">
                        Mengubah...
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
