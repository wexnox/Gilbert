<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
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
            'ingredients' => $this->faker->paragraph,
            "images" => ('https://picsum.photos/640/480'),
            "excerpt" => $this->faker->text,
            "description" => $this->faker->paragraph,
            "created_at" => Carbon::now(),
            "published_at" => Carbon::now(),
            "author" => "Bob Marley"
        ];
    }
}
