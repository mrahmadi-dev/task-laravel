<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use test\Calculator;

class ExampleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(Calculator::class,function ($app) {
            return new Calculator();
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
