<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\RoomType;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $roomTypes = RoomType::all();

        foreach (range(1, 30) as $index) {
            Room::create([
                'room_number' => $faker->unique()->numerify('###'),
                'room_type_id' => $faker->randomElement($roomTypes)->id,
                'occupancy' => $faker->randomElement(['Available', 'Occupied', 'Maintenance']),
            ]);
        }
    }
}
