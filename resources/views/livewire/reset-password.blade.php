<div class="min-h-screen flex items-center justify-center px-4 py-10 bg-tp-black">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
            <div class="mb-4">
                <h1 class="text-2xl font-bold text-gray-900">Reset Password</h1>
                <p class="text-sm text-gray-600 mt-1">
                    Silakan masukkan password baru Anda
                </p>
            </div>

            <form action="#" method="POST" class="space-y-4">
                <div class="space-y-1">
                    <label for="password" class="text-sm font-medium text-gray-700">
                        Password Baru
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="password" id="password" name="password" required
                        placeholder="Masukkan password baru"
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
                    <input type="password" id="password_confirmation" name="password_confirmation" required
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
                    <button type="submit" 
                        class="w-full h-10 px-4 text-sm font-medium rounded-md
                               bg-indigo-600 text-white 
                               hover:bg-indigo-700 
                               focus:outline-none 
                               focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                               transition">
                        Simpan Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
