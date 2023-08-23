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
            if (!Schema::hasColumn('prescription_of_medical_sessions_tbl', 'payment_status')) {
                $table->integer('payment_status')
                ->comment('0: chưa thanh toán, 1: Đã thanh toán')
                ->after('status')
                ->default(0);
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
            if (Schema::hasColumn('prescription_of_medical_sessions_tbl', 'payment_status')) {
                $table->dropColumn('payment_status');
            }
        });
    }
};
