<?php

namespace App\Livewire\User\Venues;

use App\Models\Category;
use App\Models\Venue;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Throwable;

#[Layout('layouts.app', ['title' => 'Cari Tempat'])]
class Venues extends Component
{
    use WithPagination;

    public string $searchInput = '';
    public string $search = '';
    public string $city = '';
    public string $capacity = '';
    public string $category = '';

    public array $cities = [];
    public $categories;

    protected $queryString = [
        'search',
        'city',
        'capacity',
        'category'
    ];

    public function mount()
    {
        $this->categories = Category::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

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

    public function applyFilter()
    {
        $this->search = $this->searchInput;
        $this->resetPage();
    }

    public function render()
    {
        $venues = Venue::query()
            ->where('status', 'available')
            ->when($this->search, function ($q) {
                $q->where('name', 'like', "%{$this->search}%");
            })
            ->when($this->category, function ($q) {
                $q->where('category_id', $this->category);
            })
            ->when($this->city, function ($q) {
                $q->where('city_id', $this->city);
            })
            ->when($this->capacity, function ($q) {
                match ($this->capacity) {
                    '1-25'   => $q->whereBetween('capacity', [1, 25]),
                    '26-50'  => $q->whereBetween('capacity', [26, 50]),
                    '51-75'  => $q->whereBetween('capacity', [51, 75]),
                    '76-100' => $q->whereBetween('capacity', [76, 100]),
                    default  => null,
                };
            })

            ->latest()
            ->paginate(9);

        return view('livewire.user.venues.venues', compact('venues'));
    }
}
