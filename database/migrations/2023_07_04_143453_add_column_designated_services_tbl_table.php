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
        Schema::table('designated_services_tbl', function (Blueprint $table) {
            if (!Schema::hasColumn('designated_services_tbl', 'decision_number')) {
                $table->string('decision_number', 100)->after('room_id')->nullable();
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
        Schema::table('designated_services_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('designated_services_tbl', 'decision_number')) {
                $table->dropColumn('decision_number');
            }
        });
    }
};
