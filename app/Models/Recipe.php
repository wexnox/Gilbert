<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Recipe extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'title',
        'alternative_titles',
        'author_id',
        'original_source',
        'thumbnail_image',
        'cover_image',
        'preparation_steps',
        'serving_size',
        'cooking_time',
        'description',
        'image'
    ];

    protected $casts = [
        'alternative_titles' => 'array',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function coAuthors()
    {
        return $this->belongsToMany(Author::class, 'recipe_co_authors');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients')->withPivot('quantity', 'unit');
    }

    public function tasks()
    {
        return $this->hasMany(RecipeTask::class)->orderBy('step_order');
    }
}
