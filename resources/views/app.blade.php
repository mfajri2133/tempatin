<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen flex flex-col bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC]">

    <header class="w-full mx-auto px-6 py-4 mb-6 bg-[#FAFAFA] text-gray-800 border-b border-gray-300/60">

        <nav class="flex items-center justify-between max-w-6xl mx-auto">
            <!-- KIRI: Logo + Menu -->
            <div class="flex items-center gap-10">
                <!-- Logo -->
                <div class="text-lg font-semibold tracking-tight text-gray-900">
                    Pasun<span class="text-indigo-600">Tix</span>
                </div>

                <!-- Menu Desktop -->
                <div id="menu-desktop" class="hidden md:flex items-center gap-8 text-sm text-gray-700">
                    <a href="/" class="relative after:absolute after:left-0 after:-bottom-1 after:h-[2px] after:w-0 after:bg-indigo-500 after:transition-all hover:after:w-full hover:text-gray-900">
                        Menu 1
                    </a>

                    <a href="/blog" class="relative after:absolute after:left-0 after:-bottom-1 after:h-[2px] after:w-0 after:bg-indigo-500  after:transition-all hover:after:w-full hover:text-gray-900">
                        Menu 2
                    </a>

                    <a href="/about" class="relative after:absolute after:left-0 after:-bottom-1 after:h-[2px] after:w-0 after:bg-indigo-500 after:transition-all hover:after:w-full hover:text-gray-900">
                        Menu 3
                    </a>
                </div>
            </div>

            <!-- KANAN: Search + Auth -->
            <div class="hidden md:flex items-center gap-4">
                <!-- Search -->
                <div class="relative">
                    <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>

                    <input id="search-desktop" type="text" placeholder="Search" class="w-44 pl-9 pr-3 py-1.5 text-sm rounded-md border border-gray-300 bg-gray-100 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-200"
                    />
                </div>

                @auth
                    <a href="/dashboard" class="px-4 py-1.5 text-sm rounded-md bg-indigo-600 text-white hover:bg-indigo-500 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-1.5 text-sm rounded-md border border-gray-400  text-gray-700 hover:bg-gray-100 transition">
                        Log in
                    </a>
                @endauth
            </div>

            <!-- Hamburger -->
            <button id="menu-btn" class="md:hidden text-gray-700">
                <svg id="icon-hamburger" class="w-6 h-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-4 text-sm">
            <input
                id="search-mobile"
                type="text"
                placeholder="Search"
                class="w-full px-3 py-2 rounded-md border border-gray-300 bg-gray-100 focus:outline-none"
            />

            <div class="space-y-2">
                <a href="/" class="block px-2 py-1 rounded hover:bg-gray-200">Menu 1</a>
                <a href="/blog" class="block px-2 py-1 rounded hover:bg-gray-200">Menu 2</a>
                <a href="/about" class="block px-2 py-1 rounded hover:bg-gray-200">Menu 3</a>
            </div>
        </div>
    </header>


    <main class="flex-grow flex items-center justify-center p-6">
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>
