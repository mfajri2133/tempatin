@props(['href' => null])

@if ($href)
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' => 'bg-blue-100 text-blue-600 hover:bg-blue-200 focus:ring-blue-300
                                                                inline-flex items-center gap-2 px-4 py-2 rounded text-sm
                                                                transition whitespace-nowrap text-center justify-center',
        ]) }}>

        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'bg-blue-100 text-blue-600 hover:bg-blue-200 focus:ring-blue-300
                                                                inline-flex items-center gap-2 px-4 py-2 rounded text-sm
                                                                transition whitespace-nowrap cursor-pointer text-center justify-center',
        ]) }}>

        {{ $slot }}
    </button>
@endif
