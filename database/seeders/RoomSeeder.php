<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'room_number' => '101',
            'room_type' => 'Single',
            'price' => 210000,
            'description' => 'Room ini cocok untuk 1 orang dewasa',
            'image' => 'single.png',
            'availability'  => true,
        ]);

        Room::create([
            'room_number' => '102',
            'room_type' => 'Double',
            'price' => 300000,
            'description' => 'Room ini cocok untuk 2 orang dewasa dan 1 anak',
            'image' => 'double.png',
            'availability'  => true,
        ]);

        Room::create([
            'room_number' => '103',
            'room_type' => 'Suite',
            'description' => 'Room ini cocok untuk 2 orang dewasa dan 2 anak',
            'image' => 'suite.png',
            'price' => 420000,
            'availability'  => true,
        ]);
    }
}
