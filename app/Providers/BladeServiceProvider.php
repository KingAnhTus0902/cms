<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // phpcs:disable
        Blade::directive('inputValid', function ($name) {
            return "{{ \$errors->has($name) ? 'is-invalid' : '' }}";
        });

        // Bootstrap css classes
        Blade::directive('inputError', function ($name) {
            return "{!! \$errors->first($name, '<label class=\"error\">:message</label>') !!}";
        });
        // phpcs:enable
    }
}
