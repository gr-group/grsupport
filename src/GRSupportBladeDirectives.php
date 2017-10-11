<?php

namespace GRGroup\GRSupport;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class GRSupportBladeDirectives extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
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

        Blade::directive('phone_locale', function ($args) {
            $args = explode(', ', str_replace("'", "", $args));

            if(count($args) == 1){
                list($phone) = $args;
            }elseif(count($args) == 2){
                list($phone, $locale) = $args;
            }elseif(count($args) == 3){
                list($phone, $locale, $format) = $args;
            }else{
                return null;
            }

            $phone = isset($phone) && $phone ? $phone : 0;
            $locale = isset($locale) && $locale ? $locale : 'pt-BR';
            $format = isset($format) && $format ? $format : 'n';

            return "<?php echo(\GRGroup\GRSupport\Facades\Support::phoneFormatByLocale('{$phone}', '{$locale}', '{$format}')) ?>";
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

    }
}