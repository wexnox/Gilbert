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
//        Ingredient::factory()->count(10)->create();

        Ingredient::create([
            'name' => 'Flour',
            'allergen_info' => json_encode(['gluten']),
            'nutrients' => json_encode(['calories' => 100, 'carbohydrates' => 22])
        ]);

        Ingredient::create([
            'name' => 'Sugar',
            'allergen_info' => json_encode([]),
            'nutrients' => json_encode(['calories' => 387, 'carbohydrates' => 100])
        ]);

        Ingredient::create([
            'name' => 'Egg',
            'allergen_info' => json_encode(['egg']),
            'nutrients' => json_encode(['protein' => 6, 'fat' => 5])
        ]);
    }
}
