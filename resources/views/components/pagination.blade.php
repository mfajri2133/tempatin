@php
    $color = $color ?? 'indigo';
    $colors = [
        'indigo' => [
            'primary' => 'bg-indigo-600 border-indigo-500 text-white',
            'primary_hover' => 'hover:bg-indigo-600 hover:border-indigo-500',
            'border_hover' => 'hover:border-indigo-500 hover:text-indigo-400',
            'text' => 'text-indigo-600',
        ],
        'blue' => [
            'primary' => 'bg-blue-600 border-blue-500 text-white',
            'primary_hover' => 'hover:bg-blue-600 hover:border-blue-500',
            'border_hover' => 'hover:border-blue-500 hover:text-blue-400',
            'text' => 'text-blue-600',
        ],
    ];

    $currentColors = $colors[$color];
@endphp

@if ($paginator->hasPages())
    <div class="space-y-4">
        <div class="flex sm:hidden items-center justify-center gap-3">
            @if ($paginator->onFirstPage())
                <span
                    class="flex items-center gap-2 px-4 py-2 rounded-lg text-gray-500 border border-gray-700 cursor-not-allowed text-sm font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Prev
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled"
                    class="flex items-center gap-2 px-4 py-2 rounded-lg {{ $currentColors['text'] }} border border-gray-700
                           {{ $currentColors['border_hover'] }} transition text-sm font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    Prev
                </button>
            @endif

            <div class="flex items-center gap-2 px-5 py-2 rounded-lg {{ $currentColors['primary'] }} shadow-lg">
                <span class="text-sm font-bold">{{ $paginator->currentPage() }}</span>
                <span class="text-xs opacity-75">/</span>
                <span class="text-sm font-bold">{{ $paginator->lastPage() }}</span>
            </div>

            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled"
                    class="flex items-center gap-2 px-4 py-2 rounded-lg {{ $currentColors['text'] }} border border-gray-700
                           {{ $currentColors['border_hover'] }} transition text-sm font-medium">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            @else
                <span
                    class="flex items-center gap-2 px-4 py-2 rounded-lg text-gray-500 border border-gray-700 cursor-not-allowed text-sm font-medium">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
            @endif
        </div>

        <nav role="navigation" aria-label="Pagination Navigation"
            class="hidden sm:flex items-center justify-center gap-2 text-sm">

            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 rounded-md text-gray-500 border border-gray-700 cursor-not-allowed">‹</span>
            @else
                <button wire:click="previousPage"
                    class="px-3 py-2 rounded-md {{ $currentColors['text'] }} border border-gray-700 {{ $currentColors['border_hover'] }} transition">
                    ‹
                </button>
            @endif

            @php
                $current = $paginator->currentPage();
                $last = $paginator->lastPage();

                $start = 1;
                $end = $last;
                $showLeftEllipsis = false;
                $showRightEllipsis = false;

                if ($last > 5) {
                    if ($current <= 2) {
                        // Awal
                        $start = 1;
                        $end = 3;
                        $showRightEllipsis = true;
                    } elseif ($current >= $last - 1) {
                        // Akhir
                        $start = $last - 2;
                        $end = $last;
                        $showLeftEllipsis = true;
                    } else {
                        // Tengah
                        $start = $current - 1;
                        $end = $current + 1;
                        $showLeftEllipsis = true;
                        $showRightEllipsis = true;
                    }
                }
            @endphp


            @if ($showLeftEllipsis)
                <button wire:click="gotoPage(1)"
                    class="px-4 py-2 rounded-md {{ $currentColors['text'] }} border border-gray-700 {{ $currentColors['primary_hover'] }} hover:text-white transition">
                    1
                </button>
                <span class="px-2 text-gray-500">…</span>
            @endif

            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $current)
                    <span class="px-4 py-2 rounded-md {{ $currentColors['primary'] }} font-bold shadow">
                        {{ $page }}
                    </span>
                @else
                    <button wire:click="gotoPage({{ $page }})"
                        class="px-4 py-2 rounded-md {{ $currentColors['text'] }} border border-gray-700 {{ $currentColors['primary_hover'] }} hover:text-white transition">
                        {{ $page }}
                    </button>
                @endif
            @endfor

            @if ($showRightEllipsis)
                <span class="px-2 text-gray-500">…</span>
                <button wire:click="gotoPage({{ $last }})"
                    class="px-4 py-2 rounded-md {{ $currentColors['text'] }} border border-gray-700 {{ $currentColors['primary_hover'] }} hover:text-white transition">
                    {{ $last }}
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <button wire:click="nextPage"
                    class="px-3 py-2 rounded-md {{ $currentColors['text'] }} border border-gray-700 {{ $currentColors['border_hover'] }} transition">
                    ›
                </button>
            @else
                <span class="px-3 py-2 rounded-md text-gray-500 border border-gray-700 cursor-not-allowed">›</span>
            @endif
        </nav>

        <div class="text-center text-xs text-gray-500">
            <span class="inline sm:hidden">
                {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} dari {{ $paginator->total() }}
            </span>
            <span class="hidden sm:inline">
                Menampilkan <span class="font-semibold text-gray-400">{{ $paginator->firstItem() }}</span>
                sampai <span class="font-semibold text-gray-400">{{ $paginator->lastItem() }}</span>
                dari <span class="font-semibold text-gray-400">{{ $paginator->total() }}</span> hasil
            </span>
        </div>
    </div>
@endif
