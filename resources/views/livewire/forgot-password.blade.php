<div class="min-h-screen flex items-center justify-center px-4 py-10 bg-tp-black">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
            <div class="mb-4">
                <h1 class="text-2xl font-bold text-gray-900">Lupa Password</h1>
                <p class="text-sm text-gray-600 mt-1">
                    Masukkan email Anda untuk reset password
                </p>
            </div>

            <form action="#" method="POST" class="space-y-4">
                <div class="space-y-1">
                    <label for="email" class="text-sm font-medium text-gray-700">
                        Email
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" required
                            placeholder="nama@email.com"
                            class="w-full h-10 pl-10 pr-3 text-sm rounded-md 
                                   border border-gray-300 
                                   bg-white text-gray-900 
                                   placeholder:text-gray-400 
                                   focus:outline-none 
                                   focus:border-indigo-500 
                                   focus:ring-1 focus:ring-indigo-500 
                                   transition" />
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                        class="w-full h-10 px-4 text-sm font-medium rounded-md
                               bg-indigo-600 text-white 
                               hover:bg-indigo-700 
                               focus:outline-none 
                               focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                               transition">
                        Kirim
                    </button>
                </div>
            </form>

            <div class="mt-6 flex justify-center">
                <a href="{{ route('login') }}" class="flex items-center gap-1 text-xs text-indigo-600 hover:text-indigo-700 font-medium hover:underline">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Login
                </a>
            </div>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-indigo-500 hover:text-indigo-600 font-medium hover:underline">
                Daftar sekarang
            </a>
        </p>
    </div>
</div>
