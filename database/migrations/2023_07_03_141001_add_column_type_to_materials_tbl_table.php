<?php

use App\Constants\MaterialConstants;
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
            if (!Schema::hasColumn('materials_tbl', 'type')) {
                $table->tinyInteger('type')->after('mapping_name')
                    ->comment('1: Vật tư, 2: Thuốc')->default(MaterialConstants::TYPE_MATERIAL);
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
            if (Schema::hasColumn('materials_tbl', 'type')) {
                $table->dropColumn('type');
            }
        });
    }
};
