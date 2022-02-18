<?php

namespace Database\Seeders;

use App\Models\ShoppingCart;
use Illuminate\Database\Seeder;

class ShoppingCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShoppingCart::factory()->count(4)->create();
    }
}