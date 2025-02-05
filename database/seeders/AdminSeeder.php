<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'Admin@example.com',
            'password' => Hash::make('Admin123_'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Penjoki',
            'email' => 'penjoki@example.com',
            'password' => Hash::make('Penjoki1234_'),
            'role' => 'penjoki',
        ]);
    }
}
