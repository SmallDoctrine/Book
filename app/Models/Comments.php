<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table='comments';
    protected $fillable = [
            'like',
            'text',
            'parent_id',
            'user_id',
            'news_id'
        ];

    public function children()
    {
        return $this->hasMany(self::class , 'parent_id' ,'id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}


