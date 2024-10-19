<?php

namespace App\Providers;

use App\Repository\Person\PersonRepository;
use App\Repository\Person\PersonRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
    }
}
