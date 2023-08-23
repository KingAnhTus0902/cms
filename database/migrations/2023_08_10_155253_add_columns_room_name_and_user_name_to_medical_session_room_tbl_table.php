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
            if (!Schema::hasColumn('medical_session_room_tbl', 'room_name')) {
                $table->string('room_name', 255)->after('room_id')->nullable();
            }
            if (!Schema::hasColumn('medical_session_room_tbl', 'user_name')) {
                $table->string('user_name', 255)->after('user_id')->nullable()->comment('Tên bác sỹ khám');
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
            if (Schema::hasColumn('medical_sessions_tbl', 'room_name')) {
                $table->dropColumn('room_name');
            }
            if (Schema::hasColumn('medical_sessions_tbl', 'user_name')) {
                $table->dropColumn('user_name');
            }
        });
    }
};
