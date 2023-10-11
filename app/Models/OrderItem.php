<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    function order() {
        return $this->belongsTo(Order::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }
    
    function product() {
        return $this->belongsTo(Product::class);
    }
}
