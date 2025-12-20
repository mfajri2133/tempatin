<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <form wire:submit.prevent="saveProfile" class="space-y-5">

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">
                            Foto Profil
                        </label>

                        <input type="file" wire:model="photo" accept="image/*"
                            class="block w-full text-sm text-gray-500
                                   file:mr-4 file:py-2 file:px-4
                                   file:rounded-md file:border-0
                                   file:text-sm file:font-semibold
                                   file:bg-blue-50 file:text-blue-700
                                   hover:file:bg-blue-100" />

                        <div wire:loading wire:target="photo" class="text-xs text-gray-400">
                            Uploading...
                        </div>

                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" class="w-24 h-24 rounded-full object-cover border">
                        @elseif ($currentPhoto)
                            <img src="{{ asset('storage/' . $currentPhoto) }}"
                                class="w-24 h-24 rounded-full object-cover border">
                        @endif

                        @error('photo')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Nama
                        </label>
                        <x-input wire:model.defer="name" required />
                        @error('name')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <x-input type="email" wire:model.defer="email" disabled
                            class="bg-gray-100 cursor-not-allowed" />
                    </div>

                    <div class="pt-4">
                        <button type="submit" wire:loading.attr="disabled" wire:target="saveProfile"
                            class="w-full h-10 bg-tp-blue hover:bg-[#93BFEF]
                                   text-white text-sm font-medium
                                   rounded-md transition
                                   disabled:opacity-60 disabled:cursor-not-allowed">

                            <span wire:loading.remove wire:target="saveProfile">
                                SIMPAN
                            </span>
                            <span wire:loading wire:target="saveProfile">
                                Menyimpan...
                            </span>
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div>
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <div class="space-y-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Kata Sandi Saat Ini
                        </label>
                        <x-input type="password" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Kata Sandi Baru
                        </label>
                        <x-input type="password" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Konfirmasi Kata Sandi
                        </label>
                        <x-input type="password" />
                    </div>

                    <div class="pt-4">
                        <button
                            class="w-full h-10 bg-tp-blue hover:bg-[#93BFEF]
                                   text-white text-sm font-medium
                                   rounded-md transition">
                            SIMPAN
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
