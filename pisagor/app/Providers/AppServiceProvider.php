<?php

namespace App\Providers;

use App\Ayarlar;
use MadWeb\Robots\Robots;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        (new \MadWeb\Robots\Robots)->setShouldIndexCallback(function () {
            return app()->environment('production');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
