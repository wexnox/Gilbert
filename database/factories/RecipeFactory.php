<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'preparation_steps' => $this->faker->paragraphs(3, true),
            'serving_size' => $this->faker->numberBetween(1, 6),
            'cooking_time' => $this->faker->numberBetween(10, 60), // minutes
            'image' => $this->faker->image('public/storage/images',400,300,null, false), // image will be saved to storage/images
        ];
    }
}
