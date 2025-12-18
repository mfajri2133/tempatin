<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' => 'bg-blue-100 text-blue-600 hover:bg-blue-200 focus:ring-blue-300 inline-flex items-center gap-2 px-4 py-2
                            rounded text-sm
                            transition
                            whitespace-nowrap cursor-pointer
                            text-center flex justify-center
                        ',
    ]) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
    </svg>

    {{ $slot }}
</button>
