<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieIngredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'pie_id',
        'ingredient_id',
        'created_at',
        'updated_at'
    ];
}
