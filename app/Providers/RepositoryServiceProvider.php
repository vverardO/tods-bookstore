<?php

namespace App\Providers;

use App\Repositories\BookStatusRepository;
use App\Repositories\Contracts\BookStatusRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            BookStatusRepositoryInterface::class,
            BookStatusRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {}
}
