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
            if (!Schema::hasColumn('medical_sessions_tbl', 'treatment_line')) {
                $table->integer('treatment_line')->comment('1: đúng tuyến, 2: trái tuyến: 3 thông tuyến')->after('code')->default(1);
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
            if (Schema::hasColumn('designated_services_tbl', 'treatment_line')) {
                $table->dropColumn('treatment_line')->change();
            }
        });
    }
};
