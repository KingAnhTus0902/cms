<?php

use App\Constants\PrescriptionConstants;
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
        Schema::create('prescription_of_medical_sessions_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medical_session_id');
            $table->tinyInteger('status')->comment('1: Chờ phát thuốc, 2: Đã phát thuốc, 3: Hủy phát thuốc')
                ->default(PrescriptionConstants::STATUS_WAITING_DISPENSED);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescription_of_medical_sessions_tbl');
    }
};
