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
        Schema::table('medical_session_room_tbl', function (Blueprint $table) {
            if (!Schema::hasColumn('medical_session_room_tbl', 'user_id')) {
                $table->integer('user_id')->nullable();
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
        Schema::table('medical_session_room_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('medical_session_room_tbl', 'user_id')) {
                $table->dropColumn('user_id');
            }
        });
    }
};