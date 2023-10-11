<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    function category() {
        return $this->belongsTo(Category::class);
    }

    function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    function reviews() {
        return $this->hasMany(Review::class);
    }
    function carts() {
        return $this->hasMany(Cart::class);
    }
}
