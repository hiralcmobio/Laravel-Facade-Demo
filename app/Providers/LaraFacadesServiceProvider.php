<?php

namespace App\Providers;

use App\LaraFacades\LaraFacades;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class LaraFacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('larafacades',function(){

            return new LaraFacades();

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
