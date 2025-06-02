<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Alkhabi',
            'email' => 'admin@alkhabi.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Pegawai
        User::create([
            'name' => 'Pegawai Laundry',
            'email' => 'pegawai@alkhabi.com',
            'password' => Hash::make('password'),
            'role' => 'pegawai'
        ]);

        // Kasir
        User::create([
            'name' => 'Kasir Alkhabi',
            'email' => 'kasir@alkhabi.com',
            'password' => Hash::make('password'),
            'role' => 'kasir'
        ]);

        // Konsumen contoh
        User::create([
            'name' => 'Konsumen Test',
            'email' => 'konsumen@test.com',
            'password' => Hash::make('password'),
            'role' => 'konsumen'
        ]);
    }
}