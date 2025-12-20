@props([
    'wireModel' => 'image',
    'label' => 'Foto Venue',
    'preview' => null,
])

<div class="space-y-2">
    <label class="text-sm font-medium text-gray-700">
        {{ $label }}
    </label>

    <input type="file" wire:model="{{ $wireModel }}" accept="image/*"
        class="block w-full text-sm text-gray-500
               file:mr-4 file:py-2 file:px-4
               file:rounded-md file:border-0
               file:text-sm file:font-semibold
               file:bg-blue-50 file:text-blue-700
               hover:file:bg-blue-100" />

    <div wire:loading wire:target="{{ $wireModel }}" class="text-xs text-gray-400">
        Uploading...
    </div>

    @if ($preview)
        <img src="{{ $preview }}" class="w-32 h-20 object-cover rounded border" />
    @elseif ($attributes->wire('model')->value)
        <img src="{{ $image->temporaryUrl() }}" class="w-32 h-20 object-cover rounded border" />
    @endif

    @error($wireModel)
        <p class="text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
