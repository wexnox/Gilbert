<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecipeTask::create(['recipe_id' => 1, 'step_order' => 1, 'description' => 'Mix flour and sugar.']);
        RecipeTask::create(['recipe_id' => 1, 'step_order' => 2, 'description' => 'Add eggs and mix well.']);
        RecipeTask::create(['recipe_id' => 1, 'step_order' => 3, 'description' => 'Cook on a hot griddle until golden brown.']);
    }

}
