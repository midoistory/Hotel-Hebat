<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'  => 'Admin',
            'email' => 'admin@hebat.com',
            'password'  => bcrypt('admin'),
            'role'  => 'admin',
        ]);

        User::create([
            'name'  => 'Resepsionis',
            'email' => 'resepsionis@hebat.com',
            'password'  => bcrypt('resepsionis'),
            'role'  => 'resepsionis',
        ]);

        User::create([
            'name'  => 'Tamu',
            'email' => 'tamu@gmail.com',
            'password'  => bcrypt('tamu'),
            'role'  => 'tamu',
        ]);
    }
}
