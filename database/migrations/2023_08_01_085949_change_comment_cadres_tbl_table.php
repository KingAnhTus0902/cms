<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement("ALTER TABLE cadres_tbl MODIFY COLUMN status tinyint COMMENT '0: Deactivate, 1: Active';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE cadres_tbl MODIFY COLUMN status tinyint COMMENT '0: Active, 1: Deactivate';");
    }
};
