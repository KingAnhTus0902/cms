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
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_code')) {
                $table->char('cadre_code', 6)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_name')) {
                $table->string('cadre_name', 255)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_identity_card_number')) {
                $table->string('cadre_identity_card_number', 12)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_birthday')) {
                $table->date('cadre_birthday')->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_gender')) {
                $table->tinyInteger('cadre_gender')->comment('0: Nam, 1: Nữ')->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_folk_id')) {
                $table->integer('cadre_folk_id')->comment('id dân tộc')->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_phone')) {
                $table->string('cadre_phone', 12)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_email')) {
                $table->string('cadre_email', 255)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_city_id')) {
                $table->integer('cadre_city_id')->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_district_id')) {
                $table->integer('cadre_district_id')->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_address')) {
                $table->string('cadre_address', 255)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_job')) {
                $table->string('cadre_job', 255)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_number')) {
                $table->char('cadre_medical_insurance_number', 15)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_start_date')) {
                $table->date('cadre_medical_insurance_start_date')->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_end_date')) {
                $table->date('cadre_medical_insurance_end_date')->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_is_long_date')) {
                $table->enum('cadre_is_long_date', [0, 1])->comment('0: Hạn 1 năm, 1: Hạn 5 năm')->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_symbol_code')) {
                $table->char('cadre_medical_insurance_symbol_code', 1)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_live_code')) {
                $table->char('cadre_medical_insurance_live_code', 2)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_hospital_code')) {
                $table->string('cadre_hospital_code', 5)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_medical_insurance_address')) {
                $table->string('cadre_medical_insurance_address', 255)->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'department_name')) {
                $table->string('department_name', 255)->nullable()->after('department_id');
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
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_code')) {
                $table->dropColumn('cadre_code');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_name')) {
                $table->dropColumn('cadre_name');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_identity_card_number')) {
                $table->dropColumn('cadre_identity_card_number');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_birthday')) {
                $table->dropColumn('cadre_birthday');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_gender')) {
                $table->dropColumn('cadre_gender');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_folk_id')) {
                $table->dropColumn('cadre_folk_id');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_phone')) {
                $table->dropColumn('cadre_phone');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_email')) {
                $table->dropColumn('cadre_email');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_city_id')) {
                $table->dropColumn('cadre_city_id');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_district_id')) {
                $table->dropColumn('cadre_district_id');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_address')) {
                $table->dropColumn('cadre_address');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_job')) {
                $table->dropColumn('cadre_job');
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
};
