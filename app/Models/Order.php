<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

      protected $fillable = [
        'id',
        'order_total',
        'order_placed',
        'domiciliary_id',
        'address',
        'city',
        'department',
        'created_at',
        'updated_at'

       
    ];
    use HasFactory;
}
