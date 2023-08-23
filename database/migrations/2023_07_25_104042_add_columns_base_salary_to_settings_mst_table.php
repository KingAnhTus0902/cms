<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings_mst', function (Blueprint $table) {
            if (!Schema::hasColumn('settings_mst', 'base_salary')) {
                $table->integer('base_salary')->after('ministry_of_health');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings_mst', function (Blueprint $table) {
            if (Schema::hasColumn('settings_mst', 'base_salary')) {
                $table->dropColumn('base_salary');
            }
        });
    }
};
