@props(['href' => null])

@if ($href)
    <a href="{{ $href }}" wire:navigate
        {{ $attributes->merge([
            'class' => 'p-2 rounded transition cursor-pointer',
        ]) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'p-2 rounded transition cursor-pointer',
        ]) }}>
        {{ $slot }}
    </button>
@endif
