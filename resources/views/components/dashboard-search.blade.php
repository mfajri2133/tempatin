@props([
    'placeholder' => 'Masukan keywords',
])

<div class="relative w-full sm:w-80" x-data="{ search: @entangle('search') }">
    <!-- icon -->
    <svg xmlns="http://www.w3.org/2000/svg"
        class="size-5 text-blue-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none"
        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>

    <!-- LOADING -->
    <svg wire:loading wire:target="search"
        class="size-4 animate-spin text-blue-400 absolute right-3 top-1/2 -translate-y-1/2"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
    </svg>

    <!-- CLEAR -->
    <button type="button" x-show="search.length > 0" x-transition.opacity wire:loading.remove wire:target="search"
        @click="$wire.set('search', '')"
        class="absolute right-3 top-1/2 -translate-y-1/2 text-blue-400 hover:text-blue-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- INPUT -->
    <input type="text" wire:model.live.debounce.300ms="search" placeholder="{{ $placeholder }}"
        class="w-full pl-10 pr-10 py-2 text-sm rounded
               border border-blue-200 bg-white text-gray-700
               focus:outline-none focus:ring-2 focus:ring-blue-400
               focus:border-blue-400" />
</div>
