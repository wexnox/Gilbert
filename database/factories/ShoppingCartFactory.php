<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShoppingCart>
 */
class ShoppingCartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            "excerpt" => $this->faker->text,
            "description" => $this->faker->paragraph,
            'ingredients' => $this->faker->paragraph,
            'amount' => $this->faker->randomDigit(),
            'quantity' => $this->faker->randomDigit(),
            "images" => ('https://picsum.photos/640/480'),
            "published_at" => Carbon::now(),
            'author' => $this->faker->name,
        ];
    }
}
