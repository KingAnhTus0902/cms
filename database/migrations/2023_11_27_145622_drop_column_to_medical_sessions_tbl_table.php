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
        Schema::table('medical_sessions_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('medical_sessions_tbl', 'is_emergency')) {
                $table->dropColumn('is_emergency');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'treatment_line')) {
                $table->dropColumn('treatment_line');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'hospital_id')) {
                $table->dropColumn('hospital_id');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'use_medical_insurance')) {
                $table->dropColumn('use_medical_insurance');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'health_insurance_fund')) {
                $table->dropColumn('health_insurance_fund');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'benefit_rate')) {
                $table->dropColumn('benefit_rate');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_number')) {
                $table->dropColumn('cadre_medical_insurance_number');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_start_date')) {
                $table->dropColumn('cadre_medical_insurance_start_date');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_end_date')) {
                $table->dropColumn('cadre_medical_insurance_end_date');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_is_long_date')) {
                $table->dropColumn('cadre_is_long_date');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_insurance_five_consecutive_years')) {
                $table->dropColumn('cadre_insurance_five_consecutive_years');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_symbol_code')) {
                $table->dropColumn('cadre_medical_insurance_symbol_code');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_live_code')) {
                $table->dropColumn('cadre_medical_insurance_live_code');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_hospital_code')) {
                $table->dropColumn('cadre_hospital_code');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_address')) {
                $table->dropColumn('cadre_medical_insurance_address');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'department_name')) {
                $table->dropColumn('department_name');
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
        Schema::table('medical_sessions_tbl', function (Blueprint $table) {
            //
        });
    }
};
