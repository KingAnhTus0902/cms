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
            if (!Schema::hasColumn('medical_sessions_tbl', 'cadre_insurance_five_consecutive_years')) {
                $table->date('cadre_insurance_five_consecutive_years')->after('cadre_is_long_date')->comment('Bảo hiểm 5 năm liên tục')->nullable();
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
            if (Schema::hasColumn('medical_sessions_tbl', 'cadre_insurance_five_consecutive_years')) {
                $table->dropColumn('cadre_insurance_five_consecutive_years');
            }
        });
    }
};
