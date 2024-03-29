<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Ingredient extends Model
{
    protected $fillable = ['name', 'type', 'unit_of_measurement'];

    use HasFactory, HasApiTokens;

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_ingredients')
            ->withPivot('quantity', 'measurement');
    }
}
