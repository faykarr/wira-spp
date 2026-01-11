<?php

namespace App\Livewire\Forms;

use App\Enums\UserRoles;
use App\Models\User;
use Livewire\Form;

class UserForm extends Form
{
    public ?int $userId = null;
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = 'petugas';

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'role' => ['required', 'string', 'in:super_admin,admin,petugas'],
        ];

        // Jika create (userId null), password wajib
        if ($this->userId === null) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        } else {
            // Jika edit, password opsional
            $rules['password'] = ['nullable', 'string', 'min:8', 'confirmed'];
        }

        // Validasi unique email, kecuali untuk user yang sedang di-edit
        if ($this->userId) {
            $rules['email'][] = 'unique:users,email,' . $this->userId;
        } else {
            $rules['email'][] = 'unique:users,email';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role tidak valid.',
        ];
    }

    public function setUser(User $user): void
    {
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role->value;
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function reset(...$properties): void
    {
        $this->userId = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->role = 'petugas';
    }
}
