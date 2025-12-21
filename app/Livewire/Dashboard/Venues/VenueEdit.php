<?php

namespace App\Livewire\Dashboard\Venues;

use App\Models\Category;
use App\Models\Venue;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard', ['title' => 'Ubah Tempat'])]
class VenueEdit extends Component
{
    use WithFileUploads;

    public $image;
    public ?string $existingImage = null;
    public Venue $venue;
    public int|string $category_id = '';
    public string $name = '';
    public string $address = '';
    public string $city = '';
    public int|string $capacity = '';
    public string $price_display = '';
    public int|string $price_per_hour = '';
    public string $status = 'available';

    protected $messages = [
        'category_id.required' => 'Kategori wajib dipilih',
        'category_id.exists' => 'Kategori tidak valid',
        'name.required' => 'Nama tempat wajib diisi',
        'address.required' => 'Alamat wajib diisi',
        'city.required' => 'Kota wajib diisi',
        'capacity.required' => 'Kapasitas wajib diisi',
        'capacity.integer' => 'Kapasitas harus angka',
        'price_per_hour.required' => 'Harga wajib diisi',
        'price_per_hour.numeric' => 'Harga harus angka'
    ];

    public function mount(Venue $venue)
    {
        $this->venue = $venue;

        $this->category_id = $venue->category_id;
        $this->name = $venue->name;
        $this->address = $venue->address;
        $this->city = $venue->city;
        $this->capacity = $venue->capacity;
        $this->price_per_hour = $venue->price_per_hour;
        $this->price_display = $venue->price_per_hour
            ? 'Rp ' . number_format($venue->price_per_hour, 0, ',', '.')
            : '';

        $this->status = $venue->status;
        $this->existingImage = $venue->venue_img;
    }


    public function update()
    {
        $this->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'capacity' => 'required|integer|min:1',
            'price_per_hour' => 'required|numeric|min:0',
            'status' => 'required|in:available,unavailable',
        ]);

        $imagePath = $this->existingImage;

        if ($this->image) {
            $imagePath = $this->image->store('venues', 'public');
        }

        $this->venue->update([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'capacity' => $this->capacity,
            'price_per_hour' => $this->price_per_hour,
            'status' => $this->status,
            'venue_img' => $imagePath,
        ]);

        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Tempat berhasil diperbarui',
        ]);

        return redirect()->route('dashboard.venues.index');
    }

    public function updated($property)
    {
        $this->validateOnly($property, [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'capacity' => 'required|integer|min:1',
            'price_per_hour' => 'required|numeric|min:0',
            'status' => 'required|in:available,unavailable',
        ]);
    }

    public function updatedPriceDisplay($value)
    {
        $numeric = preg_replace('/[^0-9]/', '', $value);

        $this->price_per_hour = $numeric;

        $this->price_display = $numeric
            ? 'Rp ' . number_format($numeric, 0, ',', '.')
            : '';
    }

    public function render()
    {
        $categories = Category::orderBy('name')->get();

        return view('livewire.dashboard.venues.venue-edit', compact('categories'));
    }
}
