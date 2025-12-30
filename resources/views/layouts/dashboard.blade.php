<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="h-full flex bg-[#f1f5f9]" x-data="{ sidebarOpen: false }">

    <!-- Sidebar -->
    <aside x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        class="fixed inset-y-0 left-0 z-30 w-64 flex-shrink-0 bg-tp-black shadow-lg transform transition-transform duration-300 lg:static lg:translate-x-0 flex flex-col">

        <!-- Sidebar Header -->
        <div class="px-4 py-5.5 border-b border-blue-400 text-center">
            <a href="{{ route('welcome') }}" wire:navigate class="text-xl font-bold text-white">Tempat<span
                    class="text-blue-400">IN</span></a>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="flex-1 p-4 space-y-2 text-white overflow-y-auto text-xs">
            <x-nav-item :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Dashboard</span>
            </x-nav-item>

            <x-nav-item :href="route('dashboard.admin-users')" :active="request()->routeIs('dashboard.admin-users')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    class="size-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-shield">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h2" />
                    <path d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                </svg>
                <span>Admin</span>
            </x-nav-item>

            <x-nav-item :href="route('dashboard.users')" :active="request()->routeIs('dashboard.users')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                <span>Pengguna</span>
            </x-nav-item>

            <x-nav-item :href="route('dashboard.categories')" :active="request()->routeIs('dashboard.categories')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                </svg>
                <span>Kategori</span>
            </x-nav-item>

            <x-nav-item :href="route('dashboard.venues.index')" :active="request()->routeIs('dashboard.venues.*')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                </svg>
                <span>Venue</span>
            </x-nav-item>

            <x-nav-item :href="route('dashboard.transactions.index')" :active="request()->routeIs('dashboard.transactions*')">
                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-receipt-dollar">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
                    <path d="M14.8 8a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                    <path d="M12 6v10" />
                </svg>
                <span>Transaksi</span>
            </x-nav-item>

            <x-nav-item :href="route('dashboard.inbox')" :active="request()->routeIs('dashboard.inbox')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                </svg>
                <span>Kotak Masuk</span>
            </x-nav-item>

            <x-nav-item :href="route('dashboard.qr-scanner')" :active="request()->routeIs('dashboard.qr-scanner')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />
                </svg>
                <span>Pemindai QR</span>
            </x-nav-item>
        </nav>
    </aside>

    <!-- Overlay -->
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/40 z-20 lg:hidden" style="display: none;">
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen min-w-0">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 shadow-sm">
            <div class="flex items-center border-b border-blue-400">

                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-4">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div class="ml-auto flex items-center gap-2">
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center gap-3 p-4 hover:bg-blue-100 hover:cursor-pointer transition-colors">
                            <div class="hidden sm:block text-right">
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ auth()->user()->name }}
                                </p>
                            </div>

                            <div
                                class="w-9 h-9 rounded-full flex items-center justify-center shadow-lg overflow-hidden bg-gradient-to-br from-blue-500 to-purple-600">
                                @if (!empty(auth()->user()->avatar))
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                        alt="Avatar {{ auth()->user()->name }}" class="w-full h-full object-cover" />
                                @else
                                    <span class="text-white font-semibold text-sm">
                                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                                    </span>
                                @endif
                            </div>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95" @click.outside="open = false"
                            class="absolute right-4 mt-2 w-48 bg-white rounded shadow-lg border border-gray-200 z-50 overflow-hidden"
                            style="display: none;">

                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name ?? 'User' }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email ?? '' }}</p>
                            </div>

                            <a href="{{ route('dashboard.profile') }}" wire:navigate
                                class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 text-sm text-gray-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                Profile
                            </a>

                            <hr class="border-gray-100">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-2 px-4 py-2 hover:bg-red-50 text-sm text-red-600 transition-colors cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Breadcrumb -->
            <div class="px-4 py-2 bg-white text-sm border-b border-blue-400">
                <a href="{{ route('dashboard.index') }}" wire:navigate
                    class="text-blue-500 hover:text-blue-600 transition-colors">Dashboard</a>
                @if ($title && $title !== 'Dashboard')
                    <span class="mx-2 text-gray-400">›</span>
                    <span class="text-gray-700">{{ $title }}</span>
                @endif
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 bg-gray-100 p-6 overflow-x-hidden max-w-full">
            <div class="w-full max-w-full overflow-hidden">
                {{ $slot }}
            </div>
        </main>
    </div>

    @livewireScripts
    <x-toast />
</body>

</html>
