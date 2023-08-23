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
        Schema::table('medicine_of_medical_sessions_tbl', function (Blueprint $table) {
            $table->string('materials_code', 12)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicine_of_medical_sessions_tbl', function (Blueprint $table) {
            $table->string('materials_code', 8)->change();
        });
    }
};
