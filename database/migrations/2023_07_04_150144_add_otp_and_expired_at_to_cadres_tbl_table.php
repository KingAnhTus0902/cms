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
        Schema::table('cadres_tbl', function (Blueprint $table) {
            if (!Schema::hasColumn('cadres_tbl', 'otp')) {
                $table->string('otp', 10)->after('remember_token')->nullable();
            }
            if (!Schema::hasColumn('cadres_tbl', 'expired_at')) {
                $table->timestamp('expired_at')->after('otp')->nullable();
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
        Schema::table('cadres_tbl', function (Blueprint $table) {
            if (Schema::hasColumn('cadres_tbl', 'otp')) {
                $table->dropColumn('otp');
            }
            if (Schema::hasColumn('cadres_tbl', 'expired_at')) {
                $table->dropColumn('expired_at');
            }
        });
    }
};
