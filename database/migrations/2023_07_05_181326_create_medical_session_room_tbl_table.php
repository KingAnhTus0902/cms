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
        Schema::create('medical_session_room_tbl', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->integer('medical_session_id');
            $table->tinyInteger('status_room')->default(1)->comment('1: Chờ khám, 2: Đang khám, 3: Hoàn tất');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_session_room_tbl');
    }
};
