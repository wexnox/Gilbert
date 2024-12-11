<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'type',
        'allergen_info',
        'nutrients',
        'unit_of_measurement'
    ];

    use HasFactory, HasApiTokens;

    protected $casts = [
        'allergen_info' => 'array',
        'nutrients' => 'array',
    ];
}
