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
        Schema::create('designated_service_of_medical_sessions_tbl', function (Blueprint $table) {
            $table->incrementId();
            $table->integer('creator_id')->nullable()->comment('Bác sỹ tạo chỉ định');
            $table->integer('executor_id')->nullable()->comment('Bác sỹ thực hiện chỉ định');
            $table->integer('room_id')->nullable();
            $table->integer('medical_session_id')->nullable();
            $table->integer('designated_service_id')->nullable();
            $table->string('designated_service_name')->nullable();
            $table->integer('designated_service_unit_price')->nullable();
            $table->integer('designated_insurance_unit_price')->nullable();
            $table->integer('payment_status')->default(1)->nullable()
                ->comment('1: Chưa thanh toán, 0: Đã thanh toán');
            $table->integer('designated_service_amount')->default(0);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('designated_service_of_medical_sessions_tbl');
    }
};
