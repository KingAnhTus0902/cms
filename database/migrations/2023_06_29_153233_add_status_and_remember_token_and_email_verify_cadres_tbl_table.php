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
            if (!Schema::hasColumn('cadres_tbl', 'status')) {
                $table->tinyInteger('status')->default(0)->after('address')
                    ->comment('0: Active, 1: Deactivate');
            }
            if (!Schema::hasColumn('cadres_tbl', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable();
            }
            if (!Schema::hasColumn('cadres_tbl', 'remember_token')) {
                $table->rememberToken();
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
            if (Schema::hasColumn('cadres_tbl', 'status')) {
                $table->dropColumn('status');
            }
            if (!Schema::hasColumn('cadres_tbl', 'email_verified_at')) {
                $table->dropColumn('email_verified_at');
            }
            if (!Schema::hasColumn('cadres_tbl', 'remember_token')) {
                $table->dropColumn('remember_token');
            }
        });
    }
};
