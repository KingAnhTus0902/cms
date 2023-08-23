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
            if (Schema::hasColumn('hospital_transfers_tbl', 'medical_sessions_id')) {
                $table->renameColumn('medical_sessions_id', 'medical_session_id');
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
            if (Schema::hasColumn('hospital_transfers_tbl', 'medical_session_id')) {
                $table->renameColumn('medical_session_id', 'medical_sessions_id');
            }
        });
    }
};
