<?php

namespace App\Providers;

use App\Enums\UserRoles;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Super Admin bypass semua gate
        Gate::before(function (User $user, string $ability) {
            if ($user->role === UserRoles::SUPER_ADMIN) {
                return true;
            }
        });

        // Gate untuk cek role super admin
        Gate::define('super-admin', function (User $user) {
            return $user->role === UserRoles::SUPER_ADMIN;
        });

        // Gate untuk cek role admin (admin bisa akses fitur admin)
        Gate::define('admin', function (User $user) {
            return in_array($user->role, [UserRoles::SUPER_ADMIN, UserRoles::ADMIN]);
        });

        // Gate untuk cek role petugas (semua role bisa akses)
        Gate::define('petugas', function (User $user) {
            return in_array($user->role, [UserRoles::SUPER_ADMIN, UserRoles::ADMIN, UserRoles::PETUGAS]);
        });

        // Gate untuk manajemen user (hanya super admin & admin)
        Gate::define('manage-users', function (User $user) {
            return in_array($user->role, [UserRoles::SUPER_ADMIN, UserRoles::ADMIN]);
        });

        // Gate untuk pengaturan sistem (hanya super admin)
        Gate::define('manage-settings', function (User $user) {
            return $user->role === UserRoles::SUPER_ADMIN;
        });
    }
}

