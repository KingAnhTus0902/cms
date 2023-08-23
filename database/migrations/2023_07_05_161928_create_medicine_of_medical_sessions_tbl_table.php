<?php

use App\Constants\MedicineConstants;
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
        Schema::create('medicine_of_medical_sessions_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prescription_id');
            $table->string('materials_name', 255);
            $table->string('materials_code', 8);
            $table->integer('materials_amount');
            $table->string('materials_unit', 255)->nullable();
            $table->double('materials_unit_price')->nullable();
            $table->double('materials_insurance_unit_price')->nullable();
            $table->string('materials_usage', 500);
            $table->string('advice', 500)->nullable();
            $table->integer('user_id');
            $table->boolean('payment_status')->comment('0: chưa thanh toán, 1: đã thanh toán')
                ->default(MedicineConstants::PAYMENT_PENDING);
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
        Schema::dropIfExists('medicine_of_medical_sessions_tbl');
    }
};
