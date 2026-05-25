<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user default untuk demo
        User::create([
            'name'     => 'Admin GreenBanking',
            'email'    => 'admin@greenbanking.ac.id',
            'password' => Hash::make('password'),
        ]);

        // Contoh pesan kontak
        \App\Models\Message::create([
            'nama'       => 'Budi Santoso',
            'email'      => 'budi@example.com',
            'organisasi' => 'Universitas Brawijaya',
            'pesan'      => 'Saya tertarik dengan penelitian ini dan ingin berkolaborasi.',
        ]);
    }
}
