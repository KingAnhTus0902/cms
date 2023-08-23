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
        Schema::table('group_permissions', function (Blueprint $table) {
            if (!Schema::hasColumn('group_permissions', 'order')) {
                $table->integer('order')->after('created_at');
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
        Schema::table('group_permissions', function (Blueprint $table) {
            if (Schema::hasColumn('group_permissions', 'order')) {
                $table->dropColumn('order');
            }
        });
    }
};
