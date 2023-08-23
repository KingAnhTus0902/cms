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
            if (!Schema::hasColumn('medical_session_room_tbl', 'medical_day')) {
                $table->date('medical_day')
                    ->nullable()
                    ->after('status_room');
            }
            if (!Schema::hasColumn('medical_session_room_tbl', 'ordinal')) {
                $table->integer('ordinal')
                    ->nullable()
                    ->after('medical_day')
                    ->comment('Số thứ tự khám');
            }
            if (!Schema::hasColumn('medical_session_room_tbl', 'type')) {
                $table->tinyInteger('type')
                    ->default(0)
                    ->after('ordinal')
                    ->comment('0: Đến khám trực tiếp, 1: Đặt lịch qua app');
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
            if (Schema::hasColumn('medical_session_room_tbl', 'medical_day')) {
                $table->dropColumn('medical_day');
            }
            if (Schema::hasColumn('medical_session_room_tbl', 'ordinal')) {
                $table->dropColumn('ordinal');
            }
            if (Schema::hasColumn('medical_session_room_tbl', 'type')) {
                $table->dropColumn('type');
            }
        });
    }
};
