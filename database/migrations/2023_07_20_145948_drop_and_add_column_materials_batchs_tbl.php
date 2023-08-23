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
            if (Schema::hasColumn('material_batchs_tbl', 'material_code')) {
                $table->dropColumn('material_code');
            }
            if (!Schema::hasColumn('material_batchs_tbl', 'batch_name')) {
                $table->string('batch_name', 255)->nullable()->after('status');
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
        Schema::table('material_batchs_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('material_batchs_tbl', 'batch_name')) {
                $table->dropColumn('batch_name');
            }
            if (!Schema::hasColumn('material_batchs_tbl', 'material_code')) {
                $table->string('material_code', 255)->after('material_id')->nullable();
            }
        });
    }
};
