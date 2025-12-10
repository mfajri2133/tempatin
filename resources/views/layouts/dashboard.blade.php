<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="h-full flex bg-gray-100 dark:bg-[#0f0f0f]">

    <aside x-data="{ open: false }" x-bind:class="open ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        class="fixed inset-y-0 left-0 z-30 w-64 bg-white dark:bg-[#1a1a1a] shadow-lg transform transition-transform duration-300 lg:static lg:translate-x-0">

        <div class="p-4 border-b dark:border-[#333]">
            <h1 class="text-xl font-semibold dark:text-white">Dashboard</h1>
        </div>

        <nav class="p-4 space-y-2 dark:text-white">
            <a href="/dashboard" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-[#2a2a2a]">Home</a>

            <a href="/events" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-[#2a2a2a]">Events</a>

            <a href="/orders" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-[#2a2a2a]">Orders</a>

            <a href="/profile" class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-[#2a2a2a]">Profile</a>
        </nav>
    </aside>

    <div x-data x-show="open" @click="open = false" class="fixed inset-0 bg-black/40 z-20 lg:hidden"></div>

    <div class="flex-1 flex flex-col min-h-screen">

        <header
            class="flex items-center gap-3 px-4 py-3 bg-white dark:bg-[#1a1a1a] shadow lg:shadow-none dark:border-b dark:border-[#333]">

            <button x-data="{ open: false }" @click="$dispatch('toggle-sidebar')"
                class="lg:hidden p-2 rounded hover:bg-gray-200 dark:hover:bg-[#2a2a2a]">
                <svg class="w-6 h-6 dark:text-white" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <h2 class="text-lg font-semibold dark:text-white">{{ $title ?? 'Dashboard' }}</h2>

            <div class="ml-auto flex items-center gap-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Logout</button>
                </form>
            </div>
        </header>

        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('sidebar', () => ({
                open: false,
            }));
        });

        document.addEventListener('toggle-sidebar', () => {
            document.querySelector('aside[x-data]').__x.$data.open = !document.querySelector('aside[x-data]').__x
                .$data.open;
        });
    </script>
</body>

</html>
