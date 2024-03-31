<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixedRecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $recipes = [
            [
                'title' => 'Recipe 1',
                'description' => 'Description for Recipe 1',
//                'preparation_steps' => 'Step 1, Step 2, Step 3',
                'preparation_steps' => json_encode([
                    "Step 1 for Recipe 1",
                    "Step 2 for Recipe 1",
                    // Additional steps as needed
                ]),
                'serving_size' => 4,
                'cooking_time' => 30,
                'image' => 'path/to/image1.jpg',
                'ingredients' => [
                    ['name' => 'Ingredient 1', 'type' => 'Vegetable', 'unit_of_measurement' => 'cups', 'quantity' => 2, 'measurement' => 'cups'],
                    // Add more ingredients for Recipe 1
                ],
            ],
            // Define more recipes
        ];

        foreach ($recipes as $recipeData) {
            $recipe = Recipe::create(Arr::except($recipeData, ['ingredients']));

            foreach ($recipeData['ingredients'] as $ingredientData) {
                $ingredient = Ingredient::firstOrCreate(
                    Arr::only($ingredientData, ['name', 'type', 'unit_of_measurement'])
                );
                $recipe->ingredients()->attach($ingredient->id, Arr::only($ingredientData, ['quantity', 'measurement']));
            }
        }
    }
}
