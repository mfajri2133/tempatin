<div class="min-h-screen flex items-center justify-center px-4 py-10 bg-tp-black">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
            @if ($invalidLink)
                <div class="text-center space-y-3">
                    <h1 class="text-xl font-bold text-gray-900">
                        Link Tidak Valid
                    </h1>

                    <p class="text-sm text-gray-600">
                        Token reset password atau email tidak ditemukan
                        atau sudah kedaluwarsa.
                    </p>

                    <a href="{{ route('forgot-password') }}" class="text-sm font-medium text-indigo-600 hover:underline">
                        Kirim ulang link reset password
                    </a>
                </div>
            @else
                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-gray-900">Reset Password</h1>
                    <p class="text-sm text-gray-600 mt-1">
                        Silakan masukkan password baru Anda
                    </p>
                </div>

                @error('email')
                    <div class="rounded-md bg-red-50 p-3 text-sm text-red-700">
                        {{ $message }}
                    </div>
                @enderror

                <form wire:submit.prevent="submit" class="space-y-4">
                    <input type="hidden" wire:model="email">

                    <div class="space-y-1">
                        <label for="password" class="text-sm font-medium text-gray-700">
                            Password Baru
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="password" wire:model.defer="password" required placeholder="Masukkan password baru"
                            class="w-full h-10 px-3 text-sm rounded-md
                                   border border-gray-300
                                   bg-white text-gray-900
                                   placeholder:text-gray-400
                                   focus:outline-none
                                   focus:border-indigo-500
                                   focus:ring-1 focus:ring-indigo-500
                                   transition" />
                    </div>

                    <div class="space-y-1">
                        <label for="password_confirmation" class="text-sm font-medium text-gray-700">
                            Konfirmasi Password
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="password" wire:model.defer="password_confirmation" required
                            placeholder="Ulangi password baru"
                            class="w-full h-10 px-3 text-sm rounded-md
                                   border border-gray-300
                                   bg-white text-gray-900
                                   placeholder:text-gray-400
                                   focus:outline-none
                                   focus:border-indigo-500
                                   focus:ring-1 focus:ring-indigo-500
                                   transition" />
                    </div>

                    <div class="pt-2">
                        <button type="submit" wire:loading.attr="disabled" wire:target="submit"
                            class="w-full h-10 px-4 text-sm font-medium rounded-md
                                   bg-indigo-600 text-white
                                   hover:bg-indigo-700
                                   focus:outline-none
                                   focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                                   transition">
                            <span wire:loading.remove wire:target="submit">
                                Simpan Password
                            </span>
                            <span wire:loading wire:target="submit">
                                Loading...
                            </span>
                        </button>
                    </div>
                </form>
            @endif

        </div>
    </div>
</div>
