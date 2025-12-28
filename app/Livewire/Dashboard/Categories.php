<?php

namespace App\Livewire\Dashboard;

use App\Models\Category;
use App\Traits\WithToast;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard', ['title' => 'Kategori'])]

class Categories extends Component
{
    use WithToast;
    use WithPagination;
    public string $search = '';
    public ?int $categoryId = null;
    public string $name = '';

    public bool $isEdit = false;

    protected $messages = [
        'name.required' => 'Nama wajib diisi',
        'name.max' => 'Nama maksimal 255 karakter',
    ];

    public function create()
    {
        $this->resetForm();
        $this->resetErrorBag();
        $this->isEdit = false;

        $this->dispatch('open-add-modal');
    }

    public function edit($categoryId)
    {
        $category = Category::findOrFail($categoryId);

        $this->categoryId = $category->id;
        $this->name = $category->name;

        $this->resetErrorBag();
        $this->isEdit = true;

        $this->dispatch('open-add-modal');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::updateOrCreate(
            ['id' => $this->categoryId],
            ['name' => $this->name]
        );

        $this->resetForm();
        $this->resetErrorBag();

        $this->dispatch('close-add-modal');
        $this->toast('success', $this->isEdit ? 'Kategori berhasil diperbarui' : 'Kategori berhasil ditambahkan');
    }

    public function confirmDelete($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->dispatch('open-delete-modal');
    }

    public function delete()
    {
        Category::findOrFail($this->categoryId)->delete();

        $this->dispatch('close-delete-modal');
        $this->toast('success', 'Kategori berhasil dihapus');
    }

    public function updated($property)
    {
        $this->validateOnly($property, [
            'name' => 'required|string|max:255',
        ]);
    }

    private function resetForm()
    {
        $this->reset(['categoryId', 'name', 'isEdit']);
    }

    public function render()
    {
        $categories = Category::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.categories', compact('categories'));
    }
}
