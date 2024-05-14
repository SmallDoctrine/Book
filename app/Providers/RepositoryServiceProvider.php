<?php

namespace App\Providers;

use App\Repositories\token\TokenRepositories;
use App\Repositories\token\TokenRepositoriesInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register():void
    {
        $this->app->bind(
            TokenRepositoriesInterface::class,
            TokenRepositories::class
        );
    }


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
