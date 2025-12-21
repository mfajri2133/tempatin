<?php

namespace App\Livewire\Dashboard\Venues;

use App\Models\Category;
use App\Models\Venue;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Throwable;

#[Layout('layouts.dashboard', ['title' => 'Tambah Venue'])]
class VenueCreate extends Component
{
    use WithFileUploads;

    public $image;
    public int|string $category_id = '';
    public string $name = '';
    public string $address = '';
    public string $city_code = '';
    public array $cities = [];
    public int|string $capacity = '';
    public string $price_display = '';
    public int|string $price_per_hour = '';
    public string $status = 'available';

    protected $messages = [
        'category_id.required' => 'Kategori wajib dipilih',
        'category_id.exists' => 'Kategori tidak valid',
        'name.required' => 'Nama venue wajib diisi',
        'address.required' => 'Alamat wajib diisi',
        'city_code.required' => 'Kota wajib dipilih',
        'capacity.required' => 'Kapasitas wajib diisi',
        'capacity.integer' => 'Kapasitas harus angka',
        'price_per_hour.required' => 'Harga wajib diisi',
        'price_per_hour.numeric' => 'Harga harus angka',
        'image.required' => 'Foto venue wajib diunggah',
        'image.image' => 'File harus berupa gambar',
        'image.mimes' => 'Format gambar harus JPG, PNG, atau JPEG',
        'image.max' => 'Ukuran gambar maksimal 2MB',
    ];

    public function mount()
    {
        $this->cities = $this->fetchCitiesJabar();
    }

    protected function fetchCitiesJabar(): array
    {
        try {
            $response = Http::get('https://wilayah.id/api/regencies/32.json');

            if ($response->successful()) {
                return collect($response->json('data'))
                    ->map(fn($city) => [
                        'code' => $city['code'],
                        'name' => $city['name'],
                    ])
                    ->sortBy('name')
                    ->values()
                    ->toArray();
            }
        } catch (Throwable $e) {
        }

        return [];
    }

    public function save()
    {
        $this->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city_code' => 'required|string|max:10',
            'capacity' => 'required|integer|min:1',
            'price_per_hour' => 'required|numeric|min:0',
            'status' => 'required|in:available,unavailable',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $city = collect($this->cities)
            ->firstWhere('code', $this->city_code);

        $imagePath = null;

        if ($this->image) {
            $imagePath = $this->image->store('venues', 'public');
        }

        Venue::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'address' => $this->address,
            'city_code' => $city['code'] ?? null,
            'city_name' => $city['name'] ?? null,
            'capacity' => $this->capacity,
            'price_per_hour' => $this->price_per_hour,
            'status' => $this->status,
            'venue_img' => $imagePath,
        ]);

        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Venue berhasil ditambahkan',
        ]);

        return redirect()->route('dashboard.venues.index');
    }

    public function updated($property)
    {
        $this->validateOnly($property, [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city_code' => 'required|string|max:10',
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

        return view('livewire.dashboard.venues.venue-create', compact('categories'));
    }
}
