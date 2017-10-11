<?php

namespace GRGroup\GRSupport;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class GRSupportServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (file_exists(__DIR__.'/Helpers/grsupport.php')) {
            require __DIR__.'/Helpers/grsupport.php';
        }
    }
}