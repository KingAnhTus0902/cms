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
            if (!Schema::hasColumn('cadres_tbl', 'insurance_five_consecutive_years')) {
                $table->date('insurance_five_consecutive_years')->after('is_long_date')->comment('Bảo hiểm 5 năm liên tục')->nullable();
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
            if (Schema::hasColumn('cadres_tbl', 'insurance_five_consecutive_years')) {
                $table->dropColumn('insurance_five_consecutive_years');
            }
        });
    }
};
