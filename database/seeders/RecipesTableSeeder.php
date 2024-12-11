<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Recipe::factory()->count(10)->create();
//
//        Recipe::factory()->count(20)->create()->each(function ($recipe) {
//            // For each recipe, create 3-5 ingredients and attach them
//            $ingredients = Ingredient::factory()->count(rand(3, 5))->create();
//
//            foreach ($ingredients as $ingredient) {
//                DB::table('recipe_ingredients')->insert([
//                    'recipe_id' => $recipe->id,
//                    'ingredient_id' => $ingredient->id,
//                    'quantity' => rand(1, 10),
//                    'measurement' => $this->faker->randomElement(['grams', 'tablespoons', 'cups', 'pieces', 'teaspoons']),
//                ]);
//            }
//        });

        Recipe::create([
            'title' => 'Pancakes',
            'alternative_titles' => json_encode(['Fluffy Pancakes', 'Buttermilk Pancakes']),
            'author_id' => 1,
            'original_source' => 'https://example.com/pancake-recipe',
            'thumbnail_image' => 'pancakes_thumbnail.jpg',
            'cover_image' => 'pancakes_cover.jpg'
        ]);

    }
}
