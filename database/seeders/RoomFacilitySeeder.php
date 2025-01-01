<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\RoomFacility;
use App\Models\RoomType;

class RoomFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $roomTypes = RoomType::all();

        foreach ($roomTypes as $roomType) {
            RoomFacility::create([
                'room_type_id' => $roomType->id,
                'kamar' => $faker->sentence,
                'perlengkapan_tidur' => $faker->sentence,
                'umum' => $faker->sentence,
                'makan' => $faker->sentence,
                'media' => $faker->sentence,
                'kamar_mandi' => $faker->sentence,
            ]);
        }
    }
}
