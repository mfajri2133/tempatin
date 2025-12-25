@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center gap-2 text-sm">
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 rounded-md bg-[#0f0f0f] text-gray-500 border border-gray-700 cursor-not-allowed">
                ‹
            </span>
        @else
            <button wire:click="previousPage" wire:loading.attr="disabled"
                class="px-3 py-2 rounded-md bg-[#0f0f0f] text-gray-300 border border-gray-700
                       hover:border-indigo-500 hover:text-indigo-400 transition">
                ‹
            </button>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-2 text-gray-500">
                    {{ $element }}
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 rounded-md bg-indigo-600 text-white font-bold shadow">
                            {{ $page }}
                        </span>
                    @else
                        <button wire:click="gotoPage({{ $page }})"
                            class="px-4 py-2 rounded-md bg-[#0f0f0f] text-gray-300 border border-gray-700
                                   hover:bg-indigo-600 hover:text-white hover:border-indigo-500 transition">
                            {{ $page }}
                        </button>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" wire:loading.attr="disabled"
                class="px-3 py-2 rounded-md bg-[#0f0f0f] text-gray-300 border border-gray-700
                       hover:border-indigo-500 hover:text-indigo-400 transition">
                ›
            </button>
        @else
            <span class="px-3 py-2 rounded-md bg-[#0f0f0f] text-gray-500 border border-gray-700 cursor-not-allowed">
                ›
            </span>
        @endif
    </nav>
@endif
