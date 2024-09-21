<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order_date', 'total_price', 'status'];

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }


    public function transcript()
    {
        return $this->hasOne(Transcript::class);
    }
}
