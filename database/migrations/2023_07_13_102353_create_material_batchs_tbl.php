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
        Schema::create('material_batchs_tbl', function (Blueprint $table) {
            $table->incrementId();
            $table->integer('import_materials_slip_id');
            $table->integer('material_id');
            $table->string('material_code', 255);
            $table->integer('amount')->default(0);
            $table->integer('unit_price')->default(0)->comment('Đơn giá nhập');
            $table->date('mfg_date')->nullable()->comment('Ngày sản xuất');
            $table->date('exp_date')->comment('Ngày hết hạn');
            $table->string('supplier', 255)->nullable()->comment('Nhà cung cấp');
            $table->tinyInteger('status')->nullable()->comment('0: Lưu nháp, 1: Lưu thật');
            $table->string('note', 255)->nullable();
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
        Schema::dropIfExists('material_batchs_tbl');
    }
};
