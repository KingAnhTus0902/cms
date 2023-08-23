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
        DB::statement("ALTER TABLE medical_sessions_tbl MODIFY COLUMN status tinyint COMMENT '1: Chờ khám, 2: Đang khám, 3: Chờ kết quả, 4: Hoàn tất, 5: Hủy khám' DEFAULT 1;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE medical_sessions_tbl MODIFY COLUMN status tinyint COMMENT '1: Chờ khám, 2: Đang khám, 3: Chờ kết quả, 4: Hoàn tất, 5: Hủy khám' DEFAULT 1;");
    }
};
