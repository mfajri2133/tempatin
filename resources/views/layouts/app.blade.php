<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen flex flex-col bg-ptx-black text-[#EDEDEC]">

    <!-- Header -->
    <header class="w-full mx-auto px-6 py-4 mb-6 bg-[#1a1a1a] border-b border-[#333]">

        <nav class="flex items-center justify-between max-w-6xl mx-auto">

            <!-- KIRI: Logo + Menu -->
            <div class="flex items-center gap-10">
                <div class="text-lg font-semibold tracking-tight text-white">
                    Pasun<span class="text-indigo-400">Tix</span>
                </div>

                <!-- Menu Desktop -->
                <div id="menu-desktop" class="hidden md:flex items-center gap-8 text-sm text-gray-300">
                    <a href="/"
                        class="relative after:absolute after:left-0 after:-bottom-1 after:h-[2px] after:w-0 after:bg-indigo-500 after:transition-all hover:after:w-full hover:text-white">
                        Menu 1
                    </a>

                    <a href="/blog"
                        class="relative after:absolute after:left-0 after:-bottom-1 after:h-[2px] after:w-0 after:bg-indigo-500 after:transition-all hover:after:w-full hover:text-white">
                        Menu 2
                    </a>

                    <a href="/about"
                        class="relative after:absolute after:left-0 after:-bottom-1 after:h-[2px] after:w-0 after:bg-indigo-500 after:transition-all hover:after:w-full hover:text-white">
                        Menu 3
                    </a>
                </div>
            </div>

            <!-- KANAN: Search + Auth -->
            <div class="hidden md:flex items-center gap-4">

                <!-- Search -->
                <div class="relative">
                    <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>

                    <input id="search-desktop" type="text" placeholder="Search"
                        class="w-44 pl-9 pr-3 py-1.5 text-sm rounded-md border border-[#333] bg-[#0f0f0f] text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>

                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="hover:cursor-pointer">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                            </div>
                        </button>

                        <!-- User Dropdown -->
                        <div x-show="open" @click.outside="open = false"
                            class="absolute right-0 mt-2 w-48 bg-[#1a1a1a] rounded-lg shadow-xl border border-[#333] z-50 overflow-hidden">

                            <a href="{{ route('user.profile') }}"
                                class="block px-4 py-2 hover:bg-[#2a2a2a] transition-colors text-sm text-white">
                                Profile
                            </a>

                            <hr class="border-[#333]">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 hover:bg-[#2a2a2a] transition-colors text-sm text-red-400 cursor-pointer">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-1.5 text-sm rounded-md border border-[#444] text-gray-300 hover:bg-[#2a2a2a] transition">
                        Log in
                    </a>
                @endauth
            </div>

            <!-- Hamburger -->
            <button id="menu-btn" class="md:hidden text-gray-300">
                <svg id="icon-hamburger" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-4 text-sm">
            <input id="search-mobile" type="text" placeholder="Search"
                class="w-full px-3 py-2 rounded-md border border-[#333] bg-[#0f0f0f] text-gray-200 focus:outline-none" />

            <div class="space-y-2">
                <a href="/" class="block px-2 py-1 rounded hover:bg-[#2a2a2a]">Menu 1</a>
                <a href="/blog" class="block px-2 py-1 rounded hover:bg-[#2a2a2a]">Menu 2</a>
                <a href="/about" class="block px-2 py-1 rounded hover:bg-[#2a2a2a]">Menu 3</a>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="flex-grow flex items-center justify-center p-6">
        {{ $slot }}
    </main>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>

</body>

</html>
