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
            if (!Schema::hasColumn('settings_mst', 'hospital_id')) {
                $table->integer('hospital_id')->after('id');
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
            if (Schema::hasColumn('settings_mst', 'hospital_id')) {
                $table->dropColumn('hospital_id');
            }
        });
    }
};
