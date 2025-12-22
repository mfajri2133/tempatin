<header x-data="{
    mobileMenuOpen: false,
    scrolled: false
}" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    :class="scrolled ? 'shadow-2xl bg-[#0f0f0f]/95 backdrop-blur-lg' : 'bg-[#0f0f0f]'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-[#333]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center justify-between h-16">

            <div class="flex-shrink-0">
                <a href="{{ route('welcome') }}" wire:navigate
                    class="text-xl font-bold tracking-tight text-white hover:text-indigo-400 transition-colors">
                    Tempat<span class="text-indigo-400">IN</span>
                </a>
            </div>

            <div class="hidden md:flex items-center gap-8">

                <a href="{{ route('welcome') }}" wire:navigate
                    class="relative text-sm font-medium transition-colors
                        {{ request()->routeIs('welcome') ? 'text-white' : 'text-gray-300 hover:text-white' }}
                        after:absolute after:left-0 after:-bottom-1 after:h-0.5
                        after:bg-indigo-500 after:transition-all
                        {{ request()->routeIs('welcome') ? 'after:w-full' : 'after:w-0 hover:after:w-full' }}">
                    Home
                </a>

                <a href="{{ route('venues.index') }}" wire:navigate
                    class="relative text-sm font-medium transition-colors
                        {{ request()->routeIs('venues.index') ? 'text-white' : 'text-gray-300 hover:text-white' }}
                        after:absolute after:left-0 after:-bottom-1 after:h-0.5
                        after:bg-indigo-500 after:transition-all
                        {{ request()->routeIs('venues.index') ? 'after:w-full' : 'after:w-0 hover:after:w-full' }}">
                    Cari Venue
                </a>

                <a href="{{ route('about') }}" wire:navigate
                    class="relative text-sm font-medium transition-colors
                        {{ request()->routeIs('about') ? 'text-white' : 'text-gray-300 hover:text-white' }}
                        after:absolute after:left-0 after:-bottom-1 after:h-0.5
                        after:bg-indigo-500 after:transition-all
                        {{ request()->routeIs('about') ? 'after:w-full' : 'after:w-0 hover:after:w-full' }}">
                    Tentang Kami
                </a>
            </div>

            <div class="hidden md:flex items-center gap-4">
                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-2 hover:opacity-80 transition-opacity">
                            <div
                                class="w-9 h-9 rounded-full flex items-center justify-center shadow-lg overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600">
                                @if (auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar"
                                        class="w-full h-full object-cover" />
                                @else
                                    <span class="text-white font-semibold text-sm">
                                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                                    </span>
                                @endif
                            </div>
                            <svg class="size-4 text-gray-400 transition-transform" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            @click.outside="open = false"
                            class="absolute right-0 mt-3 w-56 bg-[#1a1a1a] rounded-xl shadow-2xl
                                        border border-[#333] overflow-hidden"
                            style="display: none;">

                            <div class="px-4 py-3 border-b border-[#333]">
                                <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                            </div>

                            <div class="py-2">
                                <a href="{{ auth()->user()->role === 'admin' ? route('dashboard.profile') : route('user.profile') }}"
                                    wire:navigate
                                    class="flex items-center gap-3 px-4 py-2.5 transition-colors text-sm
                                               {{ request()->routeIs('user.profile')
                                                   ? 'bg-indigo-500/10 text-indigo-400'
                                                   : 'text-gray-300 hover:bg-[#2a2a2a] hover:text-white' }}">
                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profile
                                </a>

                                @if (auth()->user()->role === 'user')
                                    <a href="{{ route('transaction-histories.index') }}" wire:navigate
                                        class="flex items-center gap-3 px-4 py-2.5 transition-colors text-sm
                                                   {{ request()->routeIs('transaction-histories.index')
                                                       ? 'bg-indigo-500/10 text-indigo-400'
                                                       : 'text-gray-300 hover:bg-[#2a2a2a] hover:text-white' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-history size-4">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 8l0 4l2 2" />
                                            <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                                        </svg>
                                        Histori Transaksi
                                    </a>
                                @endif

                                @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('dashboard.index') }}" wire:navigate
                                        class="flex items-center gap-3 px-4 py-2.5 transition-colors text-sm
                                                   {{ request()->routeIs('dashboard.index')
                                                       ? 'bg-indigo-500/10 text-indigo-400'
                                                       : 'text-gray-300 hover:bg-[#2a2a2a] hover:text-white' }}">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                        Dashboard
                                    </a>
                                @endif
                            </div>

                            <div class="border-t border-[#333]">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center gap-3 px-4 py-2.5 hover:bg-red-500/10
                                                   transition-colors text-sm text-red-400 hover:text-red-300">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex items-center gap-3">
                        <a href="{{ route('login') }}" wire:navigate
                            class="px-4 py-2 text-sm font-medium rounded-lg border transition-all
                                       {{ request()->routeIs('login')
                                           ? 'border-indigo-500 bg-indigo-500/10 text-indigo-400'
                                           : 'border-[#444] text-gray-300 hover:bg-[#2a2a2a] hover:border-gray-500' }}">
                            Log in
                        </a>
                        <a href="{{ route('register') }}" wire:navigate
                            class="px-4 py-2 text-sm font-medium rounded-lg transition-all shadow-lg
                                       {{ request()->routeIs('register')
                                           ? 'bg-indigo-700 text-white ring-2 ring-indigo-400'
                                           : 'bg-indigo-600 text-white hover:bg-indigo-700' }}">
                            Sign up
                        </a>
                    </div>
                @endauth
            </div>

            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="md:hidden p-2 rounded-lg hover:bg-[#2a2a2a] transition-colors">
                <svg x-show="!mobileMenuOpen" class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <svg x-show="mobileMenuOpen" class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" stroke-width="2" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>

        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden py-4 border-t border-[#333]"
            style="display: none;">

            <div class="space-y-1 px-2">
                <a href="{{ route('welcome') }}" wire:navigate
                    class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm font-medium transition-colors
                               {{ request()->routeIs('welcome')
                                   ? 'bg-indigo-500/10 text-indigo-400'
                                   : 'text-gray-300 hover:bg-[#2a2a2a] hover:text-white' }}">
                    <span>Home</span>
                </a>

                <a href="{{ route('venues.index') }}" wire:navigate
                    class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm font-medium transition-colors
                               {{ request()->routeIs('venues.index')
                                   ? 'bg-indigo-500/10 text-indigo-400'
                                   : 'text-gray-300 hover:bg-[#2a2a2a] hover:text-white' }}">
                    <span>Cari Venue</span>
                </a>

                <a href="{{ route('about') }}" wire:navigate
                    class="flex items-center justify-between px-3 py-2.5 rounded-lg text-sm font-medium transition-colors
                               {{ request()->routeIs('about')
                                   ? 'bg-indigo-500/10 text-indigo-400'
                                   : 'text-gray-300 hover:bg-[#2a2a2a] hover:text-white' }}">
                    <span>Tentang Kami</span>
                </a>
            </div>

            @auth
                <div class="mt-4 pt-4 border-t border-[#333] px-2">
                    <div class="flex items-center gap-3 px-3 py-2 mb-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600
                                        rounded-full flex items-center justify-center text-white
                                        font-semibold text-sm shadow-lg">
                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-400">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <a href="{{ route('user.profile') }}" wire:navigate
                            class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                                       {{ request()->routeIs('user.profile')
                                           ? 'bg-indigo-500/10 text-indigo-400'
                                           : 'text-gray-300 hover:bg-[#2a2a2a] hover:text-white' }}">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="flex-1">Profile</span>
                        </a>

                        @if (auth()->user()->role === 'user')
                            <a href="{{ route('transaction-histories.index') }}" wire:navigate
                                class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                                           {{ request()->routeIs('transaction-histories.index')
                                               ? 'bg-indigo-500/10 text-indigo-400'
                                               : 'text-gray-300 hover:bg-[#2a2a2a] hover:text-white' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-history size-4">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 8l0 4l2 2" />
                                    <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                                </svg>
                                <span class="flex-1">Histori Transaksi</span>
                            </a>
                        @endif

                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('dashboard.index') }}" wire:navigate
                                class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                                           {{ request()->routeIs('dashboard.index')
                                               ? 'bg-indigo-500/10 text-indigo-400'
                                               : 'text-gray-300 hover:bg-[#2a2a2a] hover:text-white' }}">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <span class="flex-1">Dashboard</span>
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm
                                           text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="mt-4 pt-4 border-t border-[#333] px-2 space-y-2">
                    <a href="{{ route('login') }}" wire:navigate
                        class="block text-center px-4 py-2.5 text-sm font-medium rounded-lg transition-all
                                   {{ request()->routeIs('login')
                                       ? 'border-2 border-indigo-500 bg-indigo-500/10 text-indigo-400'
                                       : 'border border-[#444] text-gray-300 hover:bg-[#2a2a2a]' }}">
                        Log in
                    </a>
                    <a href="{{ route('register') }}" wire:navigate
                        class="block text-center px-4 py-2.5 text-sm font-medium rounded-lg transition-all shadow-lg
                                   {{ request()->routeIs('register')
                                       ? 'bg-indigo-700 text-white ring-2 ring-indigo-400'
                                       : 'bg-indigo-600 text-white hover:bg-indigo-700' }}">
                        Sign up
                    </a>
                </div>
            @endauth
        </div>
    </div>
</header>
