<div class="min-h-screen flex items-center justify-center px-4 py-10 bg-tp-black">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Login Akun</h1>
                <p class="text-sm text-gray-600 mt-1">Login akun untuk mulai memesan tempat acara</p>
            </div>
            @if (session('error'))
                <div
                    class="mb-6 p-3 bg-red-50 border border-red-200 text-red-800 text-sm rounded-md flex items-start gap-2">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if (session('success'))
                <div
                    class="mb-6 p-3 bg-green-50 border border-green-200 text-green-800 text-sm rounded-md flex items-start gap-2">
                    <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form wire:submit.prevent="login" class="space-y-5">
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
                        <input type="email" id="email" wire:model.defer="email" required
                            placeholder="nama@email.com"
                            class="w-full h-10 pl-10 pr-3 text-sm rounded-md
                                   border border-gray-300
                                   bg-white text-gray-900
                                   placeholder:text-gray-400
                                   focus:outline-none
                                   focus:border-blue-500
                                   focus:ring-1 focus:ring-blue-500
                                   transition
                                   @error('email') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" />
                    </div>
                </div>

                <div class="space-y-1">
                    <label for="password" class="text-sm font-medium text-gray-700">
                        Password
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative" x-data="{ showPassword: false }">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input :type="showPassword ? 'text' : 'password'" id="password" wire:model.defer="password"
                            required placeholder="Masukkan password"
                            class="w-full h-10 pl-10 pr-10 text-sm rounded-md
                                   border border-gray-300
                                   bg-white text-gray-900
                                   placeholder:text-gray-400
                                   focus:outline-none
                                   focus:border-blue-500
                                   focus:ring-1 focus:ring-blue-500
                                   transition
                                   @error('password') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" />
                        <button type="button" @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg x-show="!showPassword" class="w-4 h-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="showPassword" class="w-4 h-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <a href="/forgot-password"
                        class="text-xs text-blue-600 hover:text-blue-700 font-medium hover:underline">
                        Lupa password?
                    </a>
                </div>

                <div class="pt-2">
                    <button type="submit" wire:loading.attr="disabled" wire:target="login"
                        class="w-full h-10 px-4 text-sm font-medium rounded-md
               bg-blue-600 text-white
               hover:bg-blue-700
               focus:outline-none
               focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
               transition
               disabled:opacity-60 disabled:cursor-not-allowed">

                        <span wire:loading.remove wire:target="login">
                            Login
                        </span>

                        <span wire:loading wire:target="login">
                            Loading...
                        </span>
                    </button>
                </div>
            </form>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-4 bg-white text-xs text-gray-500">
                        Atau login dengan
                    </span>
                </div>
            </div>

            <div class="flex justify-center gap-3">
                <a href="{{ route('socialite.redirect', 'google') }}"
                    class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-300
                          bg-white hover:bg-gray-50 hover:border-gray-400 transition-all
                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    title="Login dengan Google">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google" />
                </a>

                <a href="{{ route('socialite.redirect', 'github') }}"
                    class="flex items-center justify-center w-10 h-10 rounded-lg border border-gray-300
                          bg-white hover:bg-gray-50 hover:border-gray-400 transition-all
                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    title="Login dengan GitHub">
                    <img src="https://www.svgrepo.com/show/512317/github-142.svg" class="w-6 h-6" alt="GitHub" />
                </a>
            </div>
        </div>

        <p class="text-center text-xs text-gray-500 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-medium hover:underline">
                Daftar sekarang
            </a>
        </p>
    </div>
</div>
