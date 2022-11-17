<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;

class DeliveryMan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'qualification',
        'number_of_orders',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    //Relación 1 a n
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
 

}
