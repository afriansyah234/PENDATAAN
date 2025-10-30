<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Contracts\Repositories\ClassroomRepository::class, function ($app) {
            return new \App\Contracts\Repositories\ClassroomRepository(new \App\Models\Classroom);
        });
        $this->app->bind(\App\Handler\NotFoundHandler::class, function ($app) {
            return new \App\Handler\NotFoundHandler(new \App\Contracts\Repositories\ClassroomRepository(new \App\Models\Classroom));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
