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
            if (!Schema::hasColumn('cadres_tbl', 'medical_insurance_end_date')) {
                $table->date('medical_insurance_end_date')->after('medical_insurance_start_date')->nullable();
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
            if (Schema::hasColumn('cadres_tbl', 'medical_insurance_end_date')) {
                $table->dropColumn('medical_insurance_end_date');
            }
        });
    }
};
