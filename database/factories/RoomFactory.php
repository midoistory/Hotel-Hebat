<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_number'   => $this->faker->unique()->numberBetween(100, 120),
            'room_type' => $this->faker->randomElement(['Standard', 'Deluxe', 'Suite']),
            'occupancy' => $this->faker->randomElement(['Available', 'Occupied', 'Maintenance']),
            'price' => $this->faker->numberBetween(100000, 600000),
            'description'   => $this->faker->text(30),
            'image' => $this->faker->imageUrl(200, 200, 'room', true, 'hotel'),
        ];
    }
}
