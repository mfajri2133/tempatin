@props([
    'show' => false,
    'title' => null,
    'maxWidth' => 'md',
])

@php
    $sizes = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
    ];
@endphp

<div x-show="{{ $show }}" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
    style="display: none;">
    <div class="bg-white w-full {{ $sizes[$maxWidth] ?? $sizes['md'] }} rounded-lg p-4 shadow-lg m-5">

        <!-- Header -->
        @if ($title)
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-900">
                    {{ $title }}
                </h3>
            </div>
        @endif

        <!-- Body -->
        <div>
            {{ $slot }}
        </div>

        <!-- Footer -->
        @isset($footer)
            <div class="mt-4 flex justify-end gap-2">
                {{ $footer }}
            </div>
        @endisset

    </div>
</div>
