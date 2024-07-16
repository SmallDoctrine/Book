<?php

namespace App\Providers;

use App\Services\Cart\Cart;
use App\Services\Cart\CartServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('totalQuantity' , \App\Facades\Cart::totalQuantity() );
    }
}
