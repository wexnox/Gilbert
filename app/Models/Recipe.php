<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Recipe extends Model
{
    protected $fillable = ['title', 'description', 'preparation_steps', 'serving_size', 'cooking_time'];

    use HasFactory, HasApiTokens;

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients')
            ->withPivot('quantity', 'measurement');
    }
}
