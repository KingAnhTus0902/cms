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
        Schema::table('materials_tbl', function (Blueprint $table) {
            if (!Schema::hasColumn('materials_tbl', 'use_insurance')) {
                $table->tinyInteger('use_insurance')->after('service_unit_price')->nullable();
            }
            if (!Schema::hasColumn('materials_tbl', 'insurance_code')) {
                $table->string('insurance_code', 25)->after('use_insurance')->nullable()
                    ->comment('0: Không thanh toán BH, 1: Thanh toán BH');
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
        Schema::table('materials_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('materials_tbl', 'use_insurance')) {
                $table->dropColumn('use_insurance');
            }
            if (Schema::hasColumn('materials_tbl', 'insurance_code')) {
                $table->dropColumn('insurance_code');
            }
        });
    }
};
