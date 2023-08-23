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
            if (!Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_active_ingredient_name')) {
                $table->string('materials_active_ingredient_name', 255)->after('materials_type_id')->nullable()->comment('Tên hoạt chất');
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
        Schema::table('medicine_of_medical_sessions_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('medicine_of_medical_sessions_tbl', 'materials_active_ingredient_name')) {
                $table->dropColumn('materials_active_ingredient_name');
            }
        });
    }
};
