<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            RoomType::create([
                'name' => $faker->unique()->word,
                'room_size' => $faker->randomFloat(2, 20, 100),
                'price' => $faker->randomFloat(2, 100, 500),
                'description' => $faker->sentence,
                'image' => $faker->imageUrl(640, 480, 'business'),
            ]);
        }
    }
}
