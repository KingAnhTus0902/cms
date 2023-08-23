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
            if (!Schema::hasColumn('medical_sessions_tbl', 'health_insurance_fund')) {
                $table->integer('health_insurance_fund')->after('payment_price')->comment('Quỹ BHYT chi trả')->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'patient_pay')) {
                $table->integer('patient_pay')->after('health_insurance_fund')->comment('Người bệnh cùng chị trả')->nullable();
            }
            if (!Schema::hasColumn('medical_sessions_tbl', 'benefit_rate')) {
                $table->integer('benefit_rate')->after('patient_pay')->comment('Mức hưởng')->nullable();
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
            if (Schema::hasColumn('medical_sessions_tbl', 'health_insurance_fund')) {
                $table->dropColumn('health_insurance_fund');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'patient_pay')) {
                $table->dropColumn('patient_pay');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'benefit_rate')) {
                $table->dropColumn('benefit_rate');
            }
        });
    }
};
