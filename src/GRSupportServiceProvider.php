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

        Blade::directive('alphanumeric', function ($str) {
            return "<?php echo(str_alphanumeric({$str})) ?>";
        });

        Blade::directive('numbers', function ($str) {
            return "<?php echo(only_numbers({$str})) ?>";
        });

        Blade::directive('agent', function ($expression) {
            return "<?php if(agent({$expression})): ?>";
        });
        Blade::directive('endagent', function () {
            return '<?php endif; ?>';
        });
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