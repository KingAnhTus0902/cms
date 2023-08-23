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
        Schema::table('medicine_of_medical_sessions_tbl', function (Blueprint $table) {
            if (!Schema::hasColumn('medicine_of_medical_sessions_tbl', 'use_insurance')) {
                $table->tinyInteger('use_insurance')
                    ->comment('0: Không thanh toán BH, 1: Thanh toán BH')
                    ->after('materials_insurance_unit_price');
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
        Schema::table('medicine_of_medical_sessions_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'use_insurance')) {
                $table->dropColumn('use_insurance');
            }
        });
    }
};
