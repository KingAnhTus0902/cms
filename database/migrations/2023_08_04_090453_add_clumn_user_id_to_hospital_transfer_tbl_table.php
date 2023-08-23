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
        Schema::table('hospital_transfers_tbl', function (Blueprint $table) {
            if (!Schema::hasColumn('hospital_transfers_tbl', 'user_id')) {
                $table->integer('user_id')->after('medical_session_id')->comment('ID người tạo')->nullable();
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
        Schema::table('hospital_transfers_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('hospital_transfers_tbl', 'user_id')) {
                $table->dropColumn('user_id');
            }
        });
    }
};
