<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'created_at',
        'updated_at'
    ];

    // Relacion 1 - 1 a Pies
    public function pie() {
        return $this->hasOne(Pies::class);
    }
}
