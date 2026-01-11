<?php

namespace Database\Seeders;

use App\Enums\UserRoles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@smkwirabahari.sch.id',
            'password' => 'password',
            'role' => UserRoles::SUPER_ADMIN,
        ]);

        // Admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@smkwirabahari.sch.id',
            'password' => 'password',
            'role' => UserRoles::ADMIN,
        ]);

        // Petugas
        User::factory()->create([
            'name' => 'Petugas',
            'email' => 'petugas@smkwirabahari.sch.id',
            'password' => 'password',
            'role' => UserRoles::PETUGAS,
        ]);
    }
}
