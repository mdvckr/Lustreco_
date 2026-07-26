<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed default Admin
        User::create([
            'name' => 'Admin Lustreco',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123*'),
            'role' => 'admin',
        ]);
    }
}