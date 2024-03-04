<?php

namespace App\Providers;

use App\Dtos\Task\TaskIndexDto;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        $this->app->bind(TaskIndexDto::class, function ($app) {
//            return new TaskIndexDto::create($app);
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
