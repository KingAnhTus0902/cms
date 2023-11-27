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
        Schema::table('materials_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('materials_tbl', 'ingredients')) {
                $table->dropColumn('ingredients');
            }
            if (Schema::hasColumn('materials_tbl', 'service_unit_price')) {
                $table->dropColumn('service_unit_price');
            }
            if (Schema::hasColumn('materials_tbl', 'use_insurance')) {
                $table->dropColumn('use_insurance');
            }
            if (Schema::hasColumn('materials_tbl', 'insurance_code')) {
                $table->dropColumn('insurance_code');
            }
            if (Schema::hasColumn('materials_tbl', 'insurance_unit_price')) {
                $table->dropColumn('insurance_unit_price');
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
        Schema::table('materials_tbl', function (Blueprint $table) {
            //
        });
    }
};
