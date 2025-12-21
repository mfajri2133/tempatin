@props([
    'wireModel' => 'image',
    'label' => 'Foto Venue',
    'preview' => null,
    'type' => 'default',
])

<div class="space-y-3">
    <label class="block text-sm font-medium text-gray-700 text-center">
        {{ $label }}
    </label>

    @php
        $hasNewImage = $this->{$wireModel} && is_object($this->{$wireModel});
        $hasExistingPreview = $preview && !$hasNewImage;
        $isProfile = $type === 'profile';
    @endphp

    <div class="flex justify-center">
        @if ($hasNewImage)
            <div class="relative inline-block">
                <img src="{{ $this->{$wireModel}->temporaryUrl() }}"
                    class="{{ $isProfile ? 'w-32 h-32 rounded-full' : 'w-48 h-32 rounded-lg' }} object-cover border-2 border-gray-300 shadow-sm"
                    alt="Preview" />

                <button type="button" wire:click="$set('{{ $wireModel }}', null)"
                    class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1.5 hover:bg-red-600 transition shadow-lg z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @elseif ($hasExistingPreview)
            <div class="relative inline-block">
                <img src="{{ $preview }}"
                    class="{{ $isProfile ? 'w-32 h-32 rounded-full' : 'w-48 h-32 rounded-lg' }} object-cover border-2 border-gray-300 shadow-sm"
                    alt="Current" />
            </div>
        @else
            <div
                class="{{ $isProfile ? 'w-32 h-32 rounded-full' : 'w-48 h-32 rounded-lg' }} bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-12 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>

            </div>
        @endif
    </div>

    @if ($hasNewImage)
        <p class="text-xs text-center text-blue-600 font-medium">Gambar baru (belum disimpan)</p>
    @elseif ($hasExistingPreview)
        <p class="text-xs text-center text-gray-500">Gambar saat ini</p>
    @endif

    <div class="flex flex-col items-center gap-2">
        <label class="cursor-pointer">
            <input type="file" wire:model="{{ $wireModel }}" accept="image/*" class="hidden" />
            <span
                class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition text-sm font-medium border border-blue-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                </svg>
                {{ $hasExistingPreview || $hasNewImage ? 'Ganti Foto' : 'Pilih Foto' }}
            </span>
        </label>

        <div wire:loading wire:target="{{ $wireModel }}" class="text-xs text-blue-600 font-medium">
            Mengupload gambar...
        </div>
    </div>

    @error($wireModel)
        <p class="text-xs text-red-600 flex items-center justify-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
        </p>
    @enderror
</div>
