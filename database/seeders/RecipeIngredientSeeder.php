<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecipeIngredient::create(['recipe_id' => 1, 'ingredient_id' => 1, 'quantity' => '2', 'unit' => 'cups']);
        RecipeIngredient::create(['recipe_id' => 1, 'ingredient_id' => 2, 'quantity' => '3', 'unit' => 'tablespoons']);
        RecipeIngredient::create(['recipe_id' => 1, 'ingredient_id' => 3, 'quantity' => '2', 'unit' => 'pieces']);
    }
}
