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
                'title' => 'Klissekake (brownies )',
                'description' => 'Digg, fuktig og seig brownies.',
//                'preparation_steps' => 'Step 1, Step 2, Step 3',
                'preparation_steps' => json_encode([
                    "Sett ovnen på 150 grader.",
                    "Smelt smøret ferdig i en kjele og avkjøl bitte litte granne.",
                    "Bland alt det tørre i en bolle og ta smelta smøret i det tørre og bland alt sammen.",
                    "Pisk inn eggene, ett om gangen (du trenger ikke overpiske, bare du ser det har blitt blandet ordentlig).",
                    "Ta melis tilslutt i deigen (hvis du vil). Bre deigen i en bakepapirkledd langpanne.",
                    "Stek kaken midt i ovnen på 45 minutter.",
                    // Additional steps as needed
                ]),
                'serving_size' => 4,
                'cooking_time' => 45,
                'image' => 'path/to/image1.jpg',
                'ingredients' => [
                    [
                        'name' => '300 g smør/ margarin',
                        'type' => 'Vegetable',
                        'unit_of_measurement' => 'grams',
                        'quantity' => 300,
                        'measurement' => 'grams'
                    ],
                    [
                        'name' => '9 dl sukker',
                        'type' => 'Fruit',
                        'unit_of_measurement' => 'dl',
                        'quantity' => 9,
                        'measurement' => 'dl'
                    ],
                    [
                        'name' => '6 egg',
                        'type' => 'Fruit',
                        'unit_of_measurement' => 'pieces',
                        'quantity' => 6,
                        'measurement' => 'pieces'
                    ],
                    [
                        'name' => '4 1/2 dl hvetemel',
                        'type' => 'Fruit',
                        'unit_of_measurement' => 'dl',
                        'quantity' => 4.5,
                        'measurement' => 'dl'
                    ],
                    [
                        'name' => '9-12 ss kakao',
                        'type' => 'Fruit',
                        'unit_of_measurement' => 'pieces',
                        'quantity' => 2,
                        'measurement' => 'pieces'
                    ],
                    [
                        'name' => '6 ts vaniljesukker',
                        'type' => 'Fruit',
                        'unit_of_measurement' => 'pieces',
                        'quantity' => 2,
                        'measurement' => 'pieces'
                    ]

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
