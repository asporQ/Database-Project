<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'stock', 'description', 'category_id', 'product_photo'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discount()
    {
        return $this->hasMany(Discount::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItems::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }

}
