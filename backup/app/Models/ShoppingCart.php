<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'excerpt',
        'description',
        'ingredients',
        'amount',
        'quantity',
        'images',
        'published_at',
        'author'
    ];
}
