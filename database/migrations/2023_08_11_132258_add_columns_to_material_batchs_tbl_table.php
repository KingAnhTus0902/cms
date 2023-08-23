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
        Schema::table('material_batchs_tbl', function (Blueprint $table) {
            $table->string('material_code', 12)->after('material_id')->nullable();
            $table->string('material_name', 255)->after('material_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_batchs_tbl', function (Blueprint $table) {
            $table->dropColumn('material_code');
            $table->dropColumn('material_name');
        });
    }
};
