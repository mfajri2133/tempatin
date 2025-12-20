@props([
    'href' => '#',
    'active' => false,
])

<a href="{{ $href }}" wire:navigate
    {{ $attributes->merge([
        'class' =>
            '
                flex items-center gap-3 px-2 py-2 rounded transition-colors text-xs
                ' .
            ($active ? 'bg-blue-500/10 text-blue-400 font-semibold' : 'text-white hover:bg-white/5 hover:text-blue-400'),
    ]) }}>
    {{ $slot }}
</a>
