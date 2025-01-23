<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@hebat.com',
                'password'  => Hash::make('admin'),
                'role'  => 'admin',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            [
                'name' => 'Resepsionis',
                'email' => 'resepsionis@hebat.com',
                'password'  => Hash::make('resepsionis'),
                'role'  => 'resepsionis',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password'  => Hash::make('user'),
                'role'  => 'user',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

        ]);
    }
}
