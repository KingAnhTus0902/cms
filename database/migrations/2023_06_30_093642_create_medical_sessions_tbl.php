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
        Schema::create('medical_sessions_tbl', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('code', 12);
            $table->tinyInteger('status')->default(1)->comment('1: Chờ khám, 2: Đang khám, 3: Hoàn tất, 4: Hủy khám');
            $table->dateTime('medical_examination_day')->comment('Ngày giờ tạo phiên khám');
            $table->dateTime('medical_examination_day_end')->comment('Ngày giờ kết thúc phiên khám')->nullable();
            $table->integer('cadre_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->tinyInteger('use_medical_insurance')->nullable()->comment('0: Không sử dụng, 1: Sử dụng');
            $table->tinyInteger('user_id')->nullable();
            $table->string('reason_for_examination', 500)->nullable()->comment('Lý do khám');
            $table->string('pathological_process', 500)->nullable()->comment('Quá trình bệnh lý');
            $table->string('personal_history', 500)->nullable()->comment('Tiền sử bản thân');
            $table->string('family_history', 500)->nullable()->comment('Tiền sử gia đình');
            $table->string('conclude', 500)->nullable()->comment('Kết luận');
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
        Schema::dropIfExists('medical_sessions_tbl');
    }
};
