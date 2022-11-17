<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
     'id',
      'order_total',
      'order_placed',
      'delivery_man_id',
      'address',
      'city',
      'department',
      'created_at',
      'updated_at'
    ];

    public function deliveryMan() {
      return $this->belongsTo(DeliveryMan::class);
    }
}
