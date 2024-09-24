<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transcript extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'payment_method', 'payment_date'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
