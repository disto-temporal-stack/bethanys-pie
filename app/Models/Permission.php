<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'id',
        'url',
        
        'method',
        'created_at',
        'updated_at'
       
    ];
    use HasFactory;
}
