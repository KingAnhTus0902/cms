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
            if (!Schema::hasColumn('designated_service_of_medical_sessions_tbl', 'medical_test_result')) {
                $table->text('medical_test_result')->after('description')->nullable();
            }
            if (!Schema::hasColumn('designated_service_of_medical_sessions_tbl', 'medical_test_conclude')) {
                $table->text('medical_test_conclude')->after('medical_test_result')->nullable();
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
            if (Schema::hasColumn('designated_service_of_medical_sessions_tbl', 'medical_test_result')) {
                $table->dropColumn('medical_test_result');
            }
            if (Schema::hasColumn('designated_service_of_medical_sessions_tbl', 'medical_test_conclude')) {
                $table->dropColumn('medical_test_conclude');
            }
        });
    }
};
