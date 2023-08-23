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
        Schema::table('cadres_tbl', function($table) {
            $table->dropColumn('medical_insurance_end_date');
            $table->string('medical_insurance_address')
                ->nullable()
                ->after('medical_insurance_start_date');
            $table->enum('is_long_date', [0, 1])
                ->default(0)->comment('0: Hạn 1 năm, 1: Hạn 5 năm')
                ->after('medical_insurance_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cadres_tbl', function($table) {
            $table->date('medical_insurance_end_date')->nullable();
            $table->dropColumn('is_long_date');
            $table->dropColumn('medical_insurance_address');
        });
    }
};
