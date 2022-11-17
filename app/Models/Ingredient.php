<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'created_at',
        'updated_at'
    ];

    // Relación n - n a Pies
    public function pies() {
        return $this->belongsToMany(Pie::class);
    }
}
