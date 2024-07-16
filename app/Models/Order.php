<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
       protected $table = 'order' ;
        protected $fillable = [
            'user_id',
            'total_price',
            'qty',
            'wallet',
        ];


        public function user()
        {
            return $this->hasOne(User::class, 'id', 'user_id');
        }
}
