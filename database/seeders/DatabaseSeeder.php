<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $this->call([
            RecipesTableSeeder::class, // The seeder for random recipes
            FixedRecipesSeeder::class, // The seeder for specific recipes
            IngredientsTableSeeder::class,
            authorSeeder::class,
            RecipeTaskSeeder::class,
            RecipeIngredientSeeder::class,
        ]);
    }
}
