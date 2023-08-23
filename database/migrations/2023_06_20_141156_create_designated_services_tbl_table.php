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
        Schema::create('designated_services_tbl', function (Blueprint $table) {
            $table->incrementId();
            $table->char('code', 7)->comment('code = "DV" + id (5 ký tự)');
            $table->string('name', 255);
            $table->integer('type_id')->nullable();
            $table->integer('room_id')->nullable();
            $table->integer('insurance_surcharge')->nullable();
            $table->string('description', 255)->nullable();
            $table->tinyInteger('use_insurance')->default(0)
                ->comment('0: Không thanh toán BH, 1: Thanh toán BH');
            $table->string('insurance_code',25)->nullable();
            $table->integer('service_unit_price')->default(0)->comment('đơn giá dịch vụ');
            $table->integer('insurance_unit_price')->default(0)->comment('đơn giá bảo hiểm');
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
        Schema::dropIfExists('designated_services_tbl');
    }
};
