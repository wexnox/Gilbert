<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email'
    ];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
