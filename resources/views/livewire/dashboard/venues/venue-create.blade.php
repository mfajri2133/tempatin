<div class="bg-white rounded shadow-md border border-blue-100 overflow-hidden">

    <!-- HEADER -->
    <div class="px-6 py-4 border-b border-blue-100">
        <h2 class="text-lg font-semibold text-gray-800">
            Tambah Venue
        </h2>
        <p class="text-sm text-gray-500">
            Lengkapi data venue di bawah ini
        </p>
    </div>

    <!-- FORM -->
    <form wire:submit.prevent="save" class="p-6" enctype="multipart/form-data" autocomplete="off">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="col-span-full">
                <x-image-upload wireModel="image" type="default" />
            </div>

            <div>
                <label class="text-sm font-medium text-gray-700">Nama</label>
                <input type="text" wire:model.live.debounce.300ms="name" placeholder="Masukkan nama venue"
                    class="w-full h-10 px-3 text-sm rounded-md border border-gray-300
                       focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500
                       @error('name') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" />
                @error('name')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- KATEGORI -->
            <div>
                <label class="text-sm font-medium text-gray-700">Kategori</label>
                <select wire:model.live="category_id"
                    class="w-full h-10 px-3 text-sm rounded-md border border-gray-300 bg-white
                       focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500
                       @error('category_id') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- KOTA -->
            <div>
                <label class="text-sm font-medium text-gray-700">Kota</label>
                <select wire:model.live="city_code"
                    class="w-full h-10 px-3 text-sm rounded-md border border-gray-300 bg-white
           focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500
           @error('city_code') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">

                    <option value="">-- Pilih Kota --</option>

                    @foreach ($cities as $city)
                        <option value="{{ $city['code'] }}">
                            {{ $city['name'] }}
                        </option>
                    @endforeach
                </select>

                @error('city_code')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- HARGA -->
            <div>
                <label class="text-sm font-medium text-gray-700">Harga per Jam</label>
                <input type="text" wire:model.live.debounce.300ms="price_display" inputmode="numeric"
                    placeholder="Rp 0"
                    class="w-full h-10 px-3 text-sm rounded-md border border-gray-300 bg-white
                       focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500
                       @error('price_per_hour') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" />
                @error('price_per_hour')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- KAPASITAS -->
            <div>
                <label class="text-sm font-medium text-gray-700">Kapasitas</label>
                <input type="number" wire:model.live.debounce.300ms="capacity" placeholder="Masukkan kapasitas"
                    class="w-full h-10 px-3 text-sm rounded-md border border-gray-300
                       focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500
                       @error('capacity') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" />
                @error('capacity')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm font-medium text-gray-700">Status</label>
                <select wire:model.live="status"
                    class="w-full h-10 px-3 text-sm rounded-md border border-gray-300
                       focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>

            <!-- ALAMAT (FULL ROW) -->
            <div class="col-span-full">
                <label class="text-sm font-medium text-gray-700">Alamat</label>
                <textarea wire:model.live="address" rows="3" placeholder="Masukkan alamat lengkap venue"
                    class="w-full px-3 py-2 text-sm rounded-md border border-gray-300
                       resize-none
                       focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500
                       @error('address') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"></textarea>
                @error('address')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- ACTION -->
        <div class="flex justify-end gap-2 pt-6">
            <x-normal-button href="{{ route('dashboard.venues.index') }}"
                class="h-9 px-4 text-sm rounded-md border border-gray-300 bg-gray-100
                   text-gray-700 hover:bg-gray-200 transition">
                Batal
            </x-normal-button>

            <x-normal-button type="submit"
                class="h-9 px-4 text-sm rounded-md bg-blue-600 text-white
                   hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition">
                Simpan
            </x-normal-button>
        </div>
    </form>
</div>
