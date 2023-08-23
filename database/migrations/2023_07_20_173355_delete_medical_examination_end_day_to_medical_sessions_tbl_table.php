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
            if (Schema::hasColumn('medical_sessions_tbl', 'medical_examination_end_day')) {
                $table->dropColumn('medical_examination_end_day');
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
            //
        });
    }
};
