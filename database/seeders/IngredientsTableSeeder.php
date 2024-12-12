<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            [
                'name' => 'Flour',
                'allergen_info' => json_encode(['gluten']),
                'nutrients' => json_encode([
                    'calories' => 364,
                    'carbohydrates' => 76,
                    'protein' => 10,
                    'fat' => 1,
                    'fiber' => 2,
                    'calcium' => 15,
                    'iron' => 5
                ])
            ],
            [
                'name' => 'Sugar',
                'allergen_info' => json_encode([]),
                'nutrients' => json_encode([
                    'calories' => 387,
                    'carbohydrates' => 100,
                    'protein' => 0,
                    'fat' => 0,
                    'fiber' => 0,
                    'calcium' => 1,
                    'iron' => 0
                ])
            ],
            [
                'name' => 'Egg',
                'allergen_info' => json_encode(['egg']),
                'nutrients' => json_encode([
                    'calories' => 68,
                    'carbohydrates' => 1,
                    'protein' => 6,
                    'fat' => 5,
                    'fiber' => 0,
                    'calcium' => 25,
                    'iron' => 1
                ])
            ],
            [
                'name' => 'Milk',
                'allergen_info' => json_encode(['dairy']),
                'nutrients' => json_encode([
                    'calories' => 42,
                    'carbohydrates' => 5,
                    'protein' => 3,
                    'fat' => 1,
                    'fiber' => 0,
                    'calcium' => 113,
                    'iron' => 0
                ])
            ],
            [
                'name' => 'Butter',
                'allergen_info' => json_encode(['dairy']),
                'nutrients' => json_encode([
                    'calories' => 717,
                    'carbohydrates' => 0,
                    'protein' => 1,
                    'fat' => 81,
                    'fiber' => 0,
                    'calcium' => 24,
                    'iron' => 0
                ])
            ],
            [
                'name' => 'Salt',
                'allergen_info' => json_encode([]),
                'nutrients' => json_encode([
                    'calories' => 0,
                    'carbohydrates' => 0,
                    'protein' => 0,
                    'fat' => 0,
                    'fiber' => 0,
                    'calcium' => 0,
                    'iron' => 0
                ])
            ],
            [
                'name' => 'Olive Oil',
                'allergen_info' => json_encode([]),
                'nutrients' => json_encode([
                    'calories' => 884,
                    'carbohydrates' => 0,
                    'protein' => 0,
                    'fat' => 100,
                    'fiber' => 0,
                    'calcium' => 1,
                    'iron' => 0
                ])
            ],
            [
                'name' => 'Chicken Breast',
                'allergen_info' => json_encode([]),
                'nutrients' => json_encode([
                    'calories' => 165,
                    'carbohydrates' => 0,
                    'protein' => 31,
                    'fat' => 3,
                    'fiber' => 0,
                    'calcium' => 13,
                    'iron' => 1
                ])
            ],
            [
                'name' => 'Rice',
                'allergen_info' => json_encode([]),
                'nutrients' => json_encode([
                    'calories' => 130,
                    'carbohydrates' => 28,
                    'protein' => 2,
                    'fat' => 0,
                    'fiber' => 1,
                    'calcium' => 10,
                    'iron' => 1
                ])
            ],
            [
                'name' => 'Carrot',
                'allergen_info' => json_encode([]),
                'nutrients' => json_encode([
                    'calories' => 41,
                    'carbohydrates' => 10,
                    'protein' => 1,
                    'fat' => 0,
                    'fiber' => 3,
                    'calcium' => 33,
                    'iron' => 0
                ])
            ],
            [
                'name' => 'Potato',
                'allergen_info' => json_encode([]),
                'nutrients' => json_encode([
                    'calories' => 77,
                    'carbohydrates' => 17,
                    'protein' => 2,
                    'fat' => 0,
                    'fiber' => 2,
                    'calcium' => 10,
                    'iron' => 1
                ])
            ],
            [
                'name' => 'Tomato',
                'allergen_info' => json_encode([]),
                'nutrients' => json_encode([
                    'calories' => 18,
                    'carbohydrates' => 4,
                    'protein' => 1,
                    'fat' => 0,
                    'fiber' => 1,
                    'calcium' => 10,
                    'iron' => 0
                ])
            ],
            [
                'name' => 'Cheese',
                'allergen_info' => json_encode(['dairy']),
                'nutrients' => json_encode([
                    'calories' => 402,
                    'carbohydrates' => 1,
                    'protein' => 25,
                    'fat' => 33,
                    'fiber' => 0,
                    'calcium' => 721,
                    'iron' => 0
                ])
            ],
            [
                'name' => 'Banana',
                'allergen_info' => json_encode([]),
                'nutrients' => json_encode([
                    'calories' => 89,
                    'carbohydrates' => 23,
                    'protein' => 1,
                    'fat' => 0,
                    'fiber' => 3,
                    'calcium' => 5,
                    'iron' => 0
                ])
            ]
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
