<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Livewire Styles --}}
    @livewireStyles
</head>

<body class="min-h-screen flex flex-col bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC]">

    {{-- Header Optional (auto hide if view does not need it) --}}
    @if (Route::has('login'))
        <header class="w-full max-w-4xl mx-auto p-6 text-sm mb-4 not-has-[nav]:hidden">
            <nav class="flex justify-end gap-4">
                @auth
                    <a href="/dashboard"
                        class="px-5 py-1.5 border border-[#19140035] dark:border-[#3E3E3A] rounded-sm hover:opacity-80 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-5 py-1.5 border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm transition">
                        Log in
                    </a>
                @endauth
            </nav>
        </header>
    @endif

    {{-- Main Content --}}
    <main class="flex-grow flex items-center justify-center p-6">
        {{ $slot }}
    </main>

    {{-- Footer spacing --}}
    @if (Route::has('login'))
        <div class="h-12"></div>
    @endif

    {{-- Livewire Scripts --}}
    @livewireScripts
</body>

</html>
