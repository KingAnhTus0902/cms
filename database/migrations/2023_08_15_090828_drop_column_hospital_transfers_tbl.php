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
        Schema::table('hospital_transfers_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('hospital_transfers_tbl', 'cadre_id')) {
                $table->dropColumn('cadre_id');
            }
            if (Schema::hasColumn('hospital_transfers_tbl', 'medical_insurance_number')) {
                $table->dropColumn('medical_insurance_number');
            }
            if (Schema::hasColumn('hospital_transfers_tbl', 'medical_insurance_start_date')) {
                $table->dropColumn('medical_insurance_start_date');
            }
            if (Schema::hasColumn('hospital_transfers_tbl', 'medical_insurance_end_date')) {
                $table->dropColumn('medical_insurance_end_date');
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
        Schema::table('hospital_transfers_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('hospital_transfers_tbl', 'cadre_id')) {
                $table->dropColumn('cadre_id');
            }
            if (Schema::hasColumn('hospital_transfers_tbl', 'medical_insurance_number')) {
                $table->dropColumn('medical_insurance_number');
            }
            if (Schema::hasColumn('hospital_transfers_tbl', 'medical_insurance_start_date')) {
                $table->dropColumn('medical_insurance_start_date');
            }
            if (Schema::hasColumn('hospital_transfers_tbl', 'medical_insurance_end_date')) {
                $table->dropColumn('medical_insurance_end_date');
            }
        });
    }
};
