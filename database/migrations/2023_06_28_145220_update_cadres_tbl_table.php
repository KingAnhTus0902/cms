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
            $table->char('medical_insurance_symbol_code', 1)->nullable()->after('medical_insurance_number');
            $table->char('medical_insurance_live_code', 2)->nullable()->after('medical_insurance_symbol_code');
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
            $table->dropColumn('medical_insurance_symbol_code');
            $table->dropColumn('medical_insurance_live_code');
        });
    }
};
