<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'step_order',
        'description'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
