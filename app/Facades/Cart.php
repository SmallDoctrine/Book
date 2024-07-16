<?php

namespace App\Facades;

use App\Services\Cart\CartServices;
use Illuminate\Support\Facades\Facade;

class Cart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CartServices::class;
    }
}
