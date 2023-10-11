<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    function product() {
        return $this->belongsTo(Product::class);
    }
    function user() {
        return $this->belongsTo(User::class);
    }
}
