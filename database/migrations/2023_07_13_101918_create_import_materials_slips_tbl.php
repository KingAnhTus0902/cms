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
        Schema::create('import_materials_slips_tbl', function (Blueprint $table) {
            $table->incrementId();
            $table->string('code', 12);
            $table->integer('user_id')->nullable();
            $table->date('import_day')->comment('Ngày nhập');
            $table->tinyInteger('status')->nullable()->comment('0: Lưu nháp, 1: Lưu thật');
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
        Schema::dropIfExists('import_materials_slips_tbl');
    }
};
