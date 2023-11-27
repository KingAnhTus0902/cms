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
        Schema::table('examination_type_mst', function (Blueprint $table) {
            if (Schema::hasColumn('examination_type_mst', 'insurance_unit_price')) {
                $table->dropColumn('insurance_unit_price');
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
        Schema::table('examination_type_mst', function (Blueprint $table) {
            //
        });
    }
};
