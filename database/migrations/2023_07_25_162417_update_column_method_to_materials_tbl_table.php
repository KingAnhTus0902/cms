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
            $table->string('method', 10)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Converting from string to tinyInteger can cause data loss or error

        // Schema::table('materials_tbl', function (Blueprint $table) {
        //     $table->smallInteger('method')->tinyInteger('method')->unsigned()->change();
        // });
    }
};
