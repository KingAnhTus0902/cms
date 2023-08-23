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
            if (!Schema::hasColumn('medical_session_room_tbl', 'examination_id')) {
                $table->integer('examination_id')->after('room_id')->nullable();
            }
            if (!Schema::hasColumn('medical_session_room_tbl', 'examination_name')) {
                $table->string('examination_name')->after('examination_id')->nullable();
            }
            if (!Schema::hasColumn('medical_session_room_tbl', 'examination_insurance_price')) {
                $table->integer('examination_insurance_price')->after('examination_name')->nullable();
            }
            if (!Schema::hasColumn('medical_session_room_tbl', 'examination_service_price')) {
                $table->integer('examination_service_price')->after('examination_insurance_price')->nullable();
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
            if (Schema::hasColumn('medical_session_room_tbl', 'examination_id')) {
                $table->dropColumn('examination_id');
            }
            if (Schema::hasColumn('medical_session_room_tbl', 'examination_name')) {
                $table->dropColumn('examination_name');
            }
            if (Schema::hasColumn('medical_session_room_tbl', 'examination_insurance_price')) {
                $table->dropColumn('examination_insurance_price');
            }
            if (Schema::hasColumn('medical_session_room_tbl', 'examination_service_price')) {
                $table->dropColumn('examination_service_price');
            }
        });
    }
};
