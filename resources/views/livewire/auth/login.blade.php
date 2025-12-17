<div class="w-full flex justify-center px-4 py-10">
    <div class="w-full bg-white max-w-sm rounded-3xl shadow-xl p-8">
        <h1 class="text-3xl font-bold text-center mb-2 text-black">Login</h1>
        <p class="text-gray-600 text-m text-center mb-2">Silahkan login ke akun Anda</p>

        @if (session('error'))
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 text-sm rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 text-sm rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="login" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-800 mb-1">Email</label>
                <input type="email" wire:model="email" id="email" required
                    class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-black"
                    placeholder="Masukkan email Anda">
                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-800 mb-1">Password</label>
                <input type="password" wire:model="password" id="password" required
                    class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-black"
                    placeholder="Masukkan password Anda">
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-right text-sm text-blue-600 hover:underline">
                <a href="#">Lupa password?</a>
            </div>

            <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium"> 
                Login 
            </button>
        </form>

        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-4 bg-white text-gray-500 text-sm">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Daftar</a>
                </span>
            </div>
        </div>

        <div class="flex justify-center space-x-4 mb-4">
            <a href="{{ route('socialite.redirect', 'google') }}"
                class="w-12 h-12 flex items-center justify-center bg-white rounded-xl shadow hover:shadow-md transition">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6"/>
            </a>

            <a href="{{ route('socialite.redirect', 'github') }}"
                class="w-12 h-12 flex items-center justify-center bg-white rounded-xl shadow hover:shadow-md transition">
                <img src="https://www.svgrepo.com/show/512317/github-142.svg" class="w-7"/>
            </a>
        </div>

    </div>
</div>