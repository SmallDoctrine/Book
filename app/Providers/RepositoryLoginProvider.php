<?php

namespace App\Providers;

use App\Repositories\auth\LoginRepositories;
use App\Repositories\auth\LoginRepositoriesInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryLoginProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            LoginRepositoriesInterface::class,
            LoginRepositories::class
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
