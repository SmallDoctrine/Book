<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Books extends Model
{
    protected $table='Books';
    protected $fillable=[
        'name',
        'description',
        'years',
        'count'
    ];

}



