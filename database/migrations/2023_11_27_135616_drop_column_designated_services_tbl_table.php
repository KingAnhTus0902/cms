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
        Schema::table('designated_services_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('designated_services_tbl', 'decision_number')) {
                $table->dropColumn('decision_number');
            }
            if (Schema::hasColumn('designated_services_tbl', 'insurance_surcharge')) {
                $table->dropColumn('insurance_surcharge');
            }
            if (Schema::hasColumn('designated_services_tbl', 'use_insurance')) {
                $table->dropColumn('use_insurance');
            }
            if (Schema::hasColumn('designated_services_tbl', 'insurance_code')) {
                $table->dropColumn('insurance_code');
            }
            if (Schema::hasColumn('designated_services_tbl', 'insurance_unit_price')) {
                $table->dropColumn('insurance_unit_price');
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
        //
    }
};
