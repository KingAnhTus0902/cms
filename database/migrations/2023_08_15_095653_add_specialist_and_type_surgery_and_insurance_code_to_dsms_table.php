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
        Schema::table('designated_service_of_medical_sessions_tbl', function (Blueprint $table) {
            if (!Schema::hasColumn(
                'designated_service_of_medical_sessions_tbl',
                'designated_service_type_surgery'
            )) {
                $table->smallInteger('designated_service_type_surgery')
                    ->after('designated_service_unit_price')
                    ->nullable()->comment(
                        '1: Xét nghiệm, 2: Chẩn đoán hình ảnh, 3: Thăm dò chức năng, 4: Thủ thuật, phẫu thuật'
                    );
            }
            if (!Schema::hasColumn(
                'designated_service_of_medical_sessions_tbl',
                'designated_service_specialist'
            )) {
                $table->integer('designated_service_specialist')
                    ->after('designated_service_type_surgery')->nullable();
            }
            if (!Schema::hasColumn(
                'designated_service_of_medical_sessions_tbl',
                'designated_service_insurance_code'
            )) {
                $table->string('designated_service_insurance_code', 25)
                    ->after('designated_service_type_surgery')
                    ->nullable();
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
        Schema::table('designated_service_of_medical_sessions_tbl', function (Blueprint $table) {
            if (Schema::hasColumn(
                'designated_service_of_medical_sessions_tbl',
                'designated_service_type_surgery'
            )) {
                $table->dropColumn('designated_service_type_surgery');
            }
            if (Schema::hasColumn(
                'designated_service_of_medical_sessions_tbl',
                'designated_service_specialist'
            )) {
                $table->dropColumn('designated_service_specialist');
            }
            if (Schema::hasColumn(
                'designated_service_of_medical_sessions_tbl',
                'designated_service_insurance_code'
            )) {
                $table->dropColumn('designated_service_insurance_code');
            }
        });
    }
};
