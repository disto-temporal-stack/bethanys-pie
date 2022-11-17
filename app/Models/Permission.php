<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rol;
class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'URL',
        
        'Method',
        
       
    ];

    //Relación n a n
    public function roles()
    {
        return $this->belongsToMany(Rol::class);
    }

   
}
