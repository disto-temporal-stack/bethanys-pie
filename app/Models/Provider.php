<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'created_at',
        'updated_at'
    ];

    // Relacion 1 - n a Pies
    public function pies() {
        return $this->hasMany(Pies::class);
    }
}
