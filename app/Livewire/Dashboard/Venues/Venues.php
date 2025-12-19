<?php

namespace App\Livewire\Dashboard\Venues;

use App\Models\Category;
use App\Models\Venue;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard', ['title' => 'Tempat'])]
class Venues extends Component
{
    public string $search = '';

    public ?int $venueId = null;

    public int|string $category_id = '';
    public string $name = '';
    public string $address = '';
    public string $city = '';
    public string $province = '';
    public int|string $capacity = '';
    public int|string $price_per_hour = '';
    public string $status = 'available';

    public bool $isEdit = false;

    protected $messages = [
        'category_id.required' => 'Kategori wajib dipilih',
        'name.required' => 'Nama tempat wajib diisi',
        'address.required' => 'Alamat wajib diisi',
        'city.required' => 'Kota wajib diisi',
        'province.required' => 'Provinsi wajib diisi',
        'capacity.required' => 'Kapasitas wajib diisi',
        'capacity.integer' => 'Kapasitas harus angka',
        'price_per_hour.required' => 'Harga wajib diisi',
        'price_per_hour.numeric' => 'Harga harus angka',
    ];

    public function create()
    {
        $this->resetForm();
        $this->resetErrorBag();
        $this->isEdit = false;

        $this->dispatch('open-add-modal');
    }

    public function edit($venueId)
    {
        $venue = Venue::findOrFail($venueId);

        $this->venueId = $venue->id;
        $this->category_id = $venue->category_id;
        $this->name = $venue->name;
        $this->address = $venue->address;
        $this->city = $venue->city;
        $this->province = $venue->province;
        $this->capacity = $venue->capacity;
        $this->price_per_hour = $venue->price_per_hour;
        $this->status = $venue->status;

        $this->resetErrorBag();
        $this->isEdit = true;

        $this->dispatch('open-add-modal');
    }

    public function save()
    {
        $this->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'capacity' => 'required|integer|min:1',
            'price_per_hour' => 'required|numeric|min:0',
            'status' => 'required|in:available,unavailable',
        ]);

        Venue::updateOrCreate(
            ['id' => $this->venueId],
            [
                'category_id' => $this->category_id,
                'name' => $this->name,
                'address' => $this->address,
                'city' => $this->city,
                'province' => $this->province,
                'capacity' => $this->capacity,
                'price_per_hour' => $this->price_per_hour,
                'status' => $this->status,
            ]
        );

        $this->resetForm();
        $this->resetErrorBag();

        $this->dispatch('close-add-modal');
        $this->dispatch('toast', [
            'type' => 'success',
            'message' => $this->isEdit
                ? 'Tempat berhasil diperbarui'
                : 'Tempat berhasil ditambahkan',
        ]);
    }

    public function confirmDelete($venueId)
    {
        $this->venueId = $venueId;
        $this->dispatch('open-delete-modal');
    }

    public function delete()
    {
        Venue::findOrFail($this->venueId)->delete();

        $this->dispatch('close-delete-modal');
        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Tempat berhasil dihapus',
        ]);
    }

    public function updated($property)
    {
        $this->validateOnly($property, [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'capacity' => 'required|integer|min:1',
            'price_per_hour' => 'required|numeric|min:0',
            'status' => 'required|in:available,unavailable',
        ]);
    }

    private function resetForm()
    {
        $this->reset([
            'venueId',
            'category_id',
            'name',
            'address',
            'city',
            'province',
            'capacity',
            'price_per_hour',
            'status',
            'isEdit',
        ]);

        $this->status = 'available';
    }

    public function render()
    {
        $venues = Venue::with('category')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('city', 'like', "%{$this->search}%");
            })
            ->latest()
            ->get();

        $categories = Category::orderBy('name')->get();

        return view('livewire.dashboard.venues.venues', compact('venues', 'categories'));
    }
}
