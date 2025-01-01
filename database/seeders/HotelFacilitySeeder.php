<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\HotelFacility;

class HotelFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            HotelFacility::create([
                'name' => $faker->unique()->word,
                'description' => $faker->sentence,
                'image' => $faker->imageUrl(640, 480, 'hotel'),
            ]);
        }
    }
}
