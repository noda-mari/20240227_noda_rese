<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_id' => $this->faker->numberBetween(1, 20),
            'user_id' => $this->faker->numberBetween(1, 13),
            'review_star' => $this->faker->numberBetween(1, 5),
            'review_comment' => $this->faker->realText(100)
        ];
    }
}
