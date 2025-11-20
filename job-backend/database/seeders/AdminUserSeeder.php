<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Ariseup Admin',
            'email' => 'admin@ariseup.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);
    }
}
