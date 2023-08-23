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
        Schema::table('prescription_of_medical_sessions_tbl', function (Blueprint $table) {
            if (!Schema::hasColumn('prescription_of_medical_sessions_tbl', 'payment_at')) {
                $table->dateTime('payment_at')->after('payment_status')->nullable();
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
        Schema::table('prescription_of_medical_sessions_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('prescription_of_medical_sessions_tbl', 'payment_at')) {
                $table->dropColumn('payment_at');
            }
        });
    }
};
