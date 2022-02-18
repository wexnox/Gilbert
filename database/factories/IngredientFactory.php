<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
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
            'amount' => $this->faker->randomDigit(),
            'quantity' => $this->faker->randomDigit(),
            "images" => ('https://picsum.photos/640/480'),
//            "created_at" => Carbon::now(),
//            "published_at" => Carbon::now(),
        ];
    }
}
