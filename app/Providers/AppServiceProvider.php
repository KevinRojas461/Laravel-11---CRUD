<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// nuevo Schema
// importar la fachada de esquema
use Illuminate\Support\Facades\Schema;

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
        // version de MySQl para no tener problemas a la hora de ejecutar las 
        // migraciones 
        Schema::defaultStringLength(191);
    }
}
