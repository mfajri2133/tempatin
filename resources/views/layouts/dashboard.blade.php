<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="h-full flex bg-[#0f0f0f]" x-data="{ sidebarOpen: false }">

    <!-- Sidebar -->
    <aside x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        class="fixed inset-y-0 left-0 z-30 w-64 bg-[#1a1a1a] shadow-lg transform transition-transform duration-300 lg:static lg:translate-x-0 flex flex-col">

        <!-- Sidebar Header -->
        <div class="p-4 border-b border-[#333]">
            <h1 class="text-xl font-bold text-white">Pasuntix</h1>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="flex-1 p-4 space-y-2 text-white overflow-y-auto text-sm">

            <a href="/dashboard"
                class="flex items-center gap-3 px-3 py-2 rounded transition-colors
                {{ request()->is('dashboard') ? 'bg-blue-900/30 text-blue-400 font-semibold' : 'hover:bg-[#2a2a2a]' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>

                <span>Dashboard</span>
            </a>

            <a href="/users"
                class="flex items-center gap-3 px-3 py-2 rounded transition-colors
                {{ request()->is('users*') ? 'bg-blue-900/30 text-blue-400 font-semibold' : 'hover:bg-[#2a2a2a]' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                <span>Pengguna</span>
            </a>

            <a href="/admin"
                class="flex items-center gap-3 px-3 py-2 rounded transition-colors
                {{ request()->is('admin*') ? 'bg-blue-900/30 text-blue-400 font-semibold' : 'hover:bg-[#2a2a2a]' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                <span>Admin</span>
            </a>

            <a href="/venues"
                class="flex items-center gap-3 px-3 py-2 rounded transition-colors
                {{ request()->is('venues*') ? 'bg-blue-900/30 text-blue-400 font-semibold' : 'hover:bg-[#2a2a2a]' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                </svg>
                <span>Venue</span>
            </a>
        </nav>
    </aside>

    <!-- Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/40 z-20 lg:hidden">
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen">

        <!-- Header -->
        <header class="bg-[#1a1a1a] border-b border-[#333]">
            <div class="flex items-center gap-3 px-4 py-1">

                <button @click="sidebarOpen = !sidebarOpen"
                    class="lg:hidden p-2 rounded hover:bg-[#2a2a2a] transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <h2 class="text-lg font-semibold text-white">
                    {{ $title ?? 'Dashboard' }}
                </h2>

                <div class="ml-auto flex items-center gap-2">
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-3 p-2 ">

                            <div
                                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                            </div>

                            <div class="hidden sm:block">
                                <p class="text-sm font-semibold text-white truncate">
                                    {{ auth()->user()->name ?? 'User' }}
                                </p>
                                <p class="text-xs text-gray-400 truncate">
                                    {{ auth()->user()->email ?? 'user@example.com' }}
                                </p>
                            </div>
                        </button>

                        <div x-show="open" @click.outside="open = false"
                            class="absolute right-0 mt-2 w-48 bg-[#1a1a1a] rounded-lg shadow-xl border border-[#333] z-50 overflow-hidden">

                            <a href="/profile" class="block px-4 py-2 hover:bg-[#2a2a2a] text-sm text-white">
                                Profile
                            </a>

                            <hr class="border-[#333]">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 hover:bg-[#2a2a2a] text-sm text-red-400">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Breadcrumb -->
            <div class="px-4 py-2 bg-[#0f0f0f] text-sm text-gray-400">
                <a href="/dashboard" class="text-blue-400 hover:underline">Dashboard</a>
                @if ($title && $title !== 'Dashboard')
                    <span class="mx-1">›</span>
                    <span class="text-white">{{ $title }}</span>
                @endif
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6 overflow-y-auto text-white">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-[#1a1a1a] border-t border-[#333] px-4 py-4 text-center text-sm text-gray-400">
            © 2025 Pasuntix. All rights reserved.
        </footer>

    </div>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>

</body>

</html>
