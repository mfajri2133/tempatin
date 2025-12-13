<div class="w-full flex justify-center px-4 py-6">
    <div class="w-full bg-white max-w-sm rounded-3xl shadow-xl p-8">
        <div class="text-center mb-4">
            <h1 class="text-3xl font-bold text-black">Daftar Akun</h1>
        </div>

        @if (session('error'))
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="register" class="space-y-4 mb-6"> 
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" id="name" wire:model="name" required
                    class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="John Doe">
                    @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email"  id="email" wire:model="email" required
                    class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="email@example.com">
                    @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password"  id="password" wire:model="password" required
                    class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Minimal 8 karakter">
                    @error('password') 
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" wire:model="password_confirmation" required
                    class="w-full text-sm px-3 py-2 border border-gray-300 rounded-lg text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Ketik ulang password">
                    @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove>Daftar</span>
                <span wire:loading>Memproses...</span>
            </button>
        </form>

        <div class="flex items-center my-4">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="px-3 text-gray-500 text-sm">Atau daftar dengan</span>
            <div class="flex-grow border-t border-gray-300"></div>
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

        <p class="text-center text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Login</a>
        </p>
    </div>
</div>