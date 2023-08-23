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
            if (!Schema::hasColumn('materials_tbl', 'method')) {
                $table->tinyInteger('method')->after('disease_type')
                    ->comment('Đường dùng')->nullable();
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
            if (Schema::hasColumn('materials_tbl', 'method')) {
                $table->dropColumn('method');
            }
        });
    }
};
