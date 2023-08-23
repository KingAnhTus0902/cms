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
        Schema::table('designated_services_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('designated_services_tbl', 'type_surgery')) {
                $table->smallInteger('type_surgery')
                    ->tinyInteger('type_surgery')
                    ->unsigned()
                    ->comment('1: Xét nghiệm, 2: Chẩn đoán hình ảnh, 3: Thăm dò chức năng, 4: Thủ thuật, phẫu thuật')
                    ->change();
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
        Schema::table('designated_services_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('designated_services_tbl', 'type_surgery')) {
                $table->smallInteger('type_surgery')
                    ->tinyInteger('type_surgery')
                    ->unsigned()
                    ->comment('')
                    ->change();
            }
        });
    }
};
