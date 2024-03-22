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
            $table->integer('status')->default(5)->comment('1: Chờ thực hiện, 2: Đang thực hiện, 3: Hoàn thành, 4: Hủy, 5: Chờ thanh toán')->change();
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
            //
        });
    }
};
