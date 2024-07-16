<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'orderItems' ;
    protected $fillable = [
        'books_id',
        'order_id',
        'total_price',
        'qty',
    ];


    public function books()
    {
        return $this->hasOne(Books::class,'id','Books_id');

    }

    public function order()
    {
        return $this->hasOne(Order::class,'id','order_id');
    }
}
