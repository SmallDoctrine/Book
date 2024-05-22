<?php

namespace App\Providers;

use App\Repositories\auth\authRepositories;
use App\Repositories\auth\AuthRepositoriesInterface;
use App\Repositories\token\TokenRepositoriesInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryAuthProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthRepositoriesInterface::class,
            authRepositories::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
