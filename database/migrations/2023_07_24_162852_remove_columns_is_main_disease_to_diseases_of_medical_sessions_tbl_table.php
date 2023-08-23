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
        Schema::table('diseases_of_medical_sessions_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('diseases_of_medical_sessions_tbl', 'is_main_disease')) {
                $table->dropColumn('is_main_disease');
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
        Schema::table('diseases_of_medical_sessions_tbl', function (Blueprint $table) {
            //
        });
    }
};
