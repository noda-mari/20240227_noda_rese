<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReserveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 13),
            'shop_id' => '1',
            'date' => $this->faker->dateTimeBetween($startDate = '-3 week', $endDate = '+2 week')->format('Y-m-d'),
            'time' => $this->faker->randomElement(['16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00']),
            'number' => $this->faker->numberBetween(1, 5),
        ];
    }
}
