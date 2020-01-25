<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Http\Resources\Json\Resource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Don't want the data sent through API being wrapped in "data": ...
        // Resource::withoutWrapping();
    }
}
