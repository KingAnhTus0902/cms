<?php

namespace App\Providers;

use App\ExtendedMySqlSchemaGrammar;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class BlueprintMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Migration increment index
        Blueprint::macro('incrementId', function ($column = 'id') {
            return $this->integer($column, true, false);
        });

        // Migration status macros
        Blueprint::macro('status', function ($column = 'status') {
            $this->tinyInteger($column)->default(0)->comment('0: Active, 1: Deactivate');
        });

        // Migration order macros
        Blueprint::macro('order', function ($column = 'order') {
            $this->integer($column)->default(0);
        });

        // Migration coordinates
        Blueprint::macro('coordinates', function () {
            $this->string('latitude', 20)->nullable();
            $this->string('longitude', 20)->nullable();
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
