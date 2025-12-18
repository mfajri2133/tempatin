<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' => '
                p-2 rounded transition cursor-pointer
            ',
    ]) }}>
    {{ $slot }}
</button>
