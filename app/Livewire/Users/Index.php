<?php

namespace App\Livewire\Users;

use App\Enums\UserRoles;
use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Manajemen User | SMK Wira Bahari')]
class Index extends Component
{
    use WithPagination;

    public UserForm $form;

    // Filter properties
    public string $search = '';
    public string $roleFilter = '';

    // Modal states
    public bool $showCreateModal = false;
    public bool $showViewModal = false;
    public bool $showEditModal = false;
    public bool $showDeleteModal = false;

    // Selected user for view/delete
    public ?User $selectedUser = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'roleFilter' => ['except' => ''],
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingRoleFilter(): void
    {
        $this->resetPage();
    }

    // Open Create Modal
    public function openCreateModal(): void
    {
        $this->form->reset();
        $this->resetValidation();
        $this->showCreateModal = true;
    }

    // Open View Modal
    public function openViewModal(int $userId): void
    {
        $this->selectedUser = User::findOrFail($userId);
        $this->showViewModal = true;
    }

    // Open Edit Modal
    public function openEditModal(int $userId): void
    {
        $user = User::findOrFail($userId);
        $this->form->setUser($user);
        $this->resetValidation();
        $this->showEditModal = true;
    }

    // Open Delete Modal
    public function openDeleteModal(int $userId): void
    {
        $this->selectedUser = User::findOrFail($userId);

        // Validasi tidak bisa hapus diri sendiri
        if ($this->selectedUser->id === auth()->id()) {
            $this->dispatch('toast', type: 'danger', message: 'Anda tidak dapat menghapus akun Anda sendiri!');
            return;
        }

        $this->showDeleteModal = true;
    }

    // Close all modals
    public function closeModal(): void
    {
        $this->showCreateModal = false;
        $this->showViewModal = false;
        $this->showEditModal = false;
        $this->showDeleteModal = false;
        $this->selectedUser = null;
        $this->form->reset();
        $this->resetValidation();
    }

    // Save new user
    public function save(): void
    {
        $this->form->validate();

        User::create([
            'name' => $this->form->name,
            'email' => $this->form->email,
            'password' => Hash::make($this->form->password),
            'role' => $this->form->role,
        ]);

        $this->closeModal();
        $this->dispatch('toast', type: 'success', message: 'User berhasil ditambahkan!');
    }

    // Update existing user
    public function update(): void
    {
        $this->form->validate();

        $user = User::findOrFail($this->form->userId);

        $data = [
            'name' => $this->form->name,
            'email' => $this->form->email,
            'role' => $this->form->role,
        ];

        // Update password hanya jika diisi
        if (!empty($this->form->password)) {
            $data['password'] = Hash::make($this->form->password);
        }

        $user->update($data);

        $this->closeModal();
        $this->dispatch('toast', type: 'success', message: 'User berhasil diperbarui!');
    }

    // Delete user
    public function delete(): void
    {
        if (!$this->selectedUser) {
            return;
        }

        // Double check: tidak bisa hapus diri sendiri
        if ($this->selectedUser->id === auth()->id()) {
            $this->closeModal();
            $this->dispatch('toast', type: 'danger', message: 'Anda tidak dapat menghapus akun Anda sendiri!');
            return;
        }

        $this->selectedUser->delete();

        $this->closeModal();
        $this->dispatch('toast', type: 'success', message: 'User berhasil dihapus!');
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->roleFilter, function ($query) {
                $query->where('role', $this->roleFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('livewire.users.index', [
            'users' => $users,
            'roles' => UserRoles::cases(),
        ]);
    }
}
