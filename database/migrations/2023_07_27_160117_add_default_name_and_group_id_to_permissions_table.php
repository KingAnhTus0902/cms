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
        Schema::table('permissions', function (Blueprint $table) {
            if (!Schema::hasColumn('permissions', 'group_id')) {
                $table->integer('group_id')->after('guard_name')->nullable();
            }
            if (!Schema::hasColumn('permissions', 'default_name')) {
                $table->string('default_name')->after('name')->nullable();
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
        Schema::table('permissions', function (Blueprint $table) {
            if (Schema::hasColumn('permissions', 'group_id')) {
                $table->dropColumn('group_id');
            }
            if (Schema::hasColumn('permissions', 'default_name')) {
                $table->dropColumn('default_name');
            }
        });
    }
};
