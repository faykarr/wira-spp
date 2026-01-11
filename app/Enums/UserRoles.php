<?php

namespace App\Enums;

enum UserRoles: string
{
    case SUPER_ADMIN = 'super_admin'; // IT Sekolah
    case ADMIN = 'admin';             // Kepala TU & Sekolah
    case PETUGAS = 'petugas';         // Petugas Pembayaran

    public function label(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Super Admin',
            self::ADMIN => 'Kepala TU',
            self::PETUGAS => 'Petugas Pembayaran',
        };
    }
}
