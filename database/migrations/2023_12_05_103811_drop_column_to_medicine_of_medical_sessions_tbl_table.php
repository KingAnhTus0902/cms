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
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_code')) {
                $table->dropColumn('materials_code');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_unit')) {
                $table->dropColumn('materials_unit');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_unit_price')) {
                $table->dropColumn('materials_unit_price');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_insurance_unit_price')) {
                $table->dropColumn('materials_insurance_unit_price');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'use_insurance')) {
                $table->dropColumn('use_insurance');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'payment_status')) {
                $table->dropColumn('payment_status');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_type_id')) {
                $table->dropColumn('materials_type_id');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_insurance_code')) {
                $table->dropColumn('materials_insurance_code');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_dosage_form')) {
                $table->dropColumn('materials_dosage_form');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_content')) {
                $table->dropColumn('materials_content');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_type_name')) {
                $table->dropColumn('materials_type_name');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_method')) {
                $table->dropColumn('materials_method');
            }
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_active_ingredient_name')) {
                $table->dropColumn('materials_active_ingredient_name');
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
            //
        });
    }
};
