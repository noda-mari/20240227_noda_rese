<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopMenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 4;

        return [
            'shop_id' => $id++,
            'menu_name' => $this->faker->randomElement(['食べ放題コース', '飲み放題コース']),
            'price' => $this->faker->randomElement(['1000', '3000', '5000']),
        ];
    }
}
