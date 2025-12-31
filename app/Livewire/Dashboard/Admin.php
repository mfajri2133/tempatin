<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Traits\WithToast;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard', ['title' => 'Admin'])]
class Admin extends Component
{
    use WithPagination;
    use WithToast;
    public string $search = '';
    public ?int $userLoggedId = null;
    public ?int $userId = null;
    public string $name = '';
    public string $email = '';
    public string $password = '';

    public bool $isEdit = false;

    protected $messages = [
        'name.required' => 'Nama wajib diisi',
        'name.max' => 'Nama maksimal 255 karakter',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.unique' => 'Email sudah digunakan',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password minimal 8 karakter',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetForm();
        $this->resetErrorBag();
        $this->isEdit = false;

        $this->dispatch('open-add-modal');
    }

    public function edit($userId)
    {
        $user = User::findOrFail($userId);

        $this->userId = $user->id;
        $this->name   = $user->name;
        $this->email  = $user->email;
        $this->password = '';

        $this->resetErrorBag();
        $this->isEdit = true;

        $this->dispatch('open-add-modal');
    }

    public function save()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->userId),
            ],
        ];

        if (!$this->isEdit) {
            $rules['password'] = 'required|min:8';
        } else {
            if (!empty($this->password)) {
                $rules['password'] = 'min:8';
            }
        }

        $this->validate($rules);

        $data = [
            'name'  => $this->name,
            'email' => $this->email,
            'role'  => 'admin',
        ];

        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        User::updateOrCreate(
            ['id' => $this->userId],
            $data
        );

        $this->resetForm();
        $this->resetErrorBag();
        $this->dispatch('close-add-modal');
        $this->toast('success', $this->isEdit ? 'Admin berhasil diperbarui' : 'Admin berhasil ditambahkan');
    }

    public function confirmDelete($userId)
    {
        $this->userId = $userId;
        $this->dispatch('open-delete-modal');
    }

    public function delete()
    {
        User::findOrFail($this->userId)->delete();

        $this->dispatch('close-delete-modal');
        $this->toast('success', 'Admin berhasil dihapus');
    }

    private function resetForm()
    {
        $this->reset(['userId', 'name', 'email', 'password', 'isEdit']);
    }

    public function updated($property)
    {
        $this->validateOnly($property, [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->userId),
            ],
            'password' => $this->isEdit
                ? 'nullable|min:8'
                : 'required|min:8',
        ]);
    }

    public function mount()
    {
        $this->userLoggedId = auth()->id();
    }

    public function render()
    {
        $users = User::query()
            ->where('role', 'admin')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.admin', compact('users'));
    }
}
