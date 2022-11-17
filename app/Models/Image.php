<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'image_url',
        'image_thumbnail_url',
        'created_at',
        'updated_at'
    ];

    // Relacion 1 - 1 a Pies
    public function pie() {
        return $this->hasOne(Pies::class);
    }
}
