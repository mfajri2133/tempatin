@props([
    'type' => 'text',
    'name' => null,
    'id' => null,
    'placeholder' => null,
])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}" placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' =>
            'w-full h-10 px-3 text-sm rounded-md border border-gray-300 bg-white text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition',
    ]) }} />
