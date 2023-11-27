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
        Schema::table('cadres_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('cadres_tbl', 'medical_insurance_number')) {
                $table->dropColumn('medical_insurance_number');
            }
            if (Schema::hasColumn('cadres_tbl', 'medical_insurance_symbol_code')) {
                $table->dropColumn('medical_insurance_symbol_code');
            }
            if (Schema::hasColumn('cadres_tbl', 'medical_insurance_live_code')) {
                $table->dropColumn('medical_insurance_live_code');
            }
            if (Schema::hasColumn('cadres_tbl', 'medical_insurance_start_date')) {
                $table->dropColumn('medical_insurance_start_date');
            }
            if (Schema::hasColumn('cadres_tbl', 'medical_insurance_end_date')) {
                $table->dropColumn('medical_insurance_end_date');
            }
            if (Schema::hasColumn('cadres_tbl', 'medical_insurance_address')) {
                $table->dropColumn('medical_insurance_address');
            }
            if (Schema::hasColumn('cadres_tbl', 'is_long_date')) {
                $table->dropColumn('is_long_date');
            }
            if (Schema::hasColumn('cadres_tbl', 'insurance_five_consecutive_years')) {
                $table->dropColumn('insurance_five_consecutive_years');
            }
            if (Schema::hasColumn('cadres_tbl', 'hospital_code')) {
                $table->dropColumn('hospital_code');
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
        Schema::table('cadres_tbl', function (Blueprint $table) {
            //
        });
    }
};
