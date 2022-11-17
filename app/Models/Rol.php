<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Rol extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'rol_name',
        'created_at',
        'updated_at'
       
    ];
     //Relación n a n
     public function permissions()
     {
         return $this->belongsToMany(Permission::class);
     }
 
   
}
