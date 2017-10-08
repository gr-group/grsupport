<?php

namespace GRGroup\GRSupport;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
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
        Blade::directive('profanity', function ($str) {
            return "<?php echo(profanity_blocker({$str})) ?>";
        });

        $this->publishes([
            __DIR__.'/Config/grsupport.php' => config_path('grsupport.php'),
        ], 'grsupport_config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/grsupport.php', 'grsupport'
        );

        if (file_exists(__DIR__.'/Helpers/grsupport.php')) {
            require __DIR__.'/Helpers/grsupport.php';
        }
    }
}
