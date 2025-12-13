<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="h-full flex bg-gray-100 dark:bg-[#0f0f0f]" x-data="{ sidebarOpen: false, notificationsOpen: false, userMenuOpen: false }">

    <!-- Sidebar -->
    <aside x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        class="fixed inset-y-0 left-0 z-30 w-64 bg-white dark:bg-[#1a1a1a] shadow-lg transform transition-transform duration-300 lg:static lg:translate-x-0 flex flex-col">

        <!-- Sidebar Header -->
        <div class="p-4 border-b dark:border-[#333]">
            <h1 class="text-xl font-bold dark:text-white">🎫 Pasuntix</h1>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="flex-1 p-4 space-y-2 dark:text-white overflow-y-auto">
            <a href="/dashboard" 
                class="flex items-center gap-3 px-3 py-2 rounded transition-colors {{ request()->is('dashboard') ? 'bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 font-semibold' : 'hover:bg-gray-100 dark:hover:bg-[#2a2a2a]' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span>Home</span>
            </a>

            <a href="/events" 
                class="flex items-center gap-3 px-3 py-2 rounded transition-colors {{ request()->is('events*') ? 'bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 font-semibold' : 'hover:bg-gray-100 dark:hover:bg-[#2a2a2a]' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                </svg>
                <span>Events</span>
            </a>

            <a href="/orders" 
                class="flex items-center gap-3 px-3 py-2 rounded transition-colors {{ request()->is('orders*') ? 'bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 font-semibold' : 'hover:bg-gray-100 dark:hover:bg-[#2a2a2a]' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3z" />
                    <path d="M16 16a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path d="M4 16a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>Orders</span>
            </a>

            <a href="/profile" 
                class="flex items-center gap-3 px-3 py-2 rounded transition-colors {{ request()->is('profile*') ? 'bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 font-semibold' : 'hover:bg-gray-100 dark:hover:bg-[#2a2a2a]' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
                <span>Profile</span>
            </a>
        </nav>

        <!-- User Profile Section in Sidebar -->
        <div class="border-t dark:border-[#333] p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold dark:text-white truncate">{{ auth()->user()->name ?? 'User' }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Sidebar Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/40 z-20 lg:hidden"></div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen">

        <!-- Header -->
        <header class="bg-white dark:bg-[#1a1a1a] shadow lg:shadow-sm dark:border-b dark:border-[#333]">
            <div class="flex items-center gap-3 px-4 py-3">
                <!-- Menu Toggle -->
                <button @click="sidebarOpen = !sidebarOpen"
                    class="lg:hidden p-2 rounded hover:bg-gray-200 dark:hover:bg-[#2a2a2a] transition-colors">
                    <svg class="w-6 h-6 dark:text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Page Title -->
                <h2 class="text-lg font-semibold dark:text-white">{{ $title ?? 'Dashboard' }}</h2>

                <!-- Right Actions -->
                <div class="ml-auto flex items-center gap-2">
                   
                    <!-- User Menu -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center gap-2 p-2 rounded hover:bg-gray-200 dark:hover:bg-[#2a2a2a] transition-colors">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                            </div>
                            <svg class="w-4 h-4 dark:text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- User Menu Dropdown -->
                        <div x-show="open" @click.outside="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-[#1a1a1a] rounded-lg shadow-xl border dark:border-[#333] z-50">
                            <a href="/profile" class="block px-4 py-2 hover:bg-gray-50 dark:hover:bg-[#2a2a2a] transition-colors text-sm dark:text-white">
                                Profile
                            </a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-50 dark:hover:bg-[#2a2a2a] transition-colors text-sm dark:text-white">
                                Settings
                            </a>
                            <hr class="dark:border-[#333]">
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-50 dark:hover:bg-[#2a2a2a] transition-colors text-sm dark:text-white text-red-600 dark:text-red-400">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Breadcrumbs -->
            <div class="px-4 py-2 bg-gray-50 dark:bg-[#0f0f0f] text-sm dark:text-gray-400">
                <div class="flex items-center gap-2">
                    <a href="/dashboard" class="text-blue-600 dark:text-blue-400 hover:underline">Dashboard</a>
                    @if($title && $title !== 'Dashboard')
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                        <span class="dark:text-white">{{ $title }}</span>
                    @endif
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-[#1a1a1a] border-t dark:border-[#333] px-4 py-4 text-center text-sm text-gray-600 dark:text-gray-400">
            <p>&copy; 2025 Pasuntix. All rights reserved. | <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Privacy</a> | <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Terms</a></p>
        </footer>
    <!-- Empty State Component Example (for use in views) -->
    <template id="empty-state">
        <div class="flex flex-col items-center justify-center py-12">
            <svg class="w-16 h-16 text-gray-300 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No data available</h3>
            <p class="text-gray-500 dark:text-gray-400 text-center max-w-md">Start by creating your first item or check back later for updates.</p>
        </div>
    </template>

    @livewireScripts

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>

</body>

</html>
