<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'allergy_information',
        'price',
        'in_stock',
        'provider_id',
        'image_id',
        'category_id',
        'created_at',
        'updated_at'
    ];

    // Relación 1 - 1 a Image
    public function image() {
        return $this->belongsTo(Image::class);
    }

    // Relación 1 - 1 a Category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Relación 1 - 1 a Provider
    public function provider() {
        return $this->belongsTo(Provider::class);
    }

    // Relación n - n a Ingredient
    public function ingredients() {
        return $this->belongsToMany(Ingredient::class);
    }

    // Relación n - n a Order
    public function orders() {
        return $this->belongsToMany(Order::class);
    }
    
}
