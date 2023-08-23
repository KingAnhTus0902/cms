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
            Schema::rename('departments', 'departments_mst');
            Schema::rename('city', 'city_mst');
            Schema::rename('diseases', 'diseases_mst');
            Schema::rename('district', 'district_mst');
            Schema::rename('hospitals', 'hospitals_mst');
            Schema::rename('organizations', 'organizations_mst');
            Schema::rename('rooms', 'rooms_mst');
            Schema::rename('units', 'units_mst');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::rename('departments_mst', 'departments');
            Schema::rename('city_mst', 'city');
            Schema::rename('diseases_mst', 'diseases');
            Schema::rename('district_mst', 'district');
            Schema::rename('hospitals_mst', 'hospitals');
            Schema::rename('organizations_mst', 'organizations');
            Schema::rename('rooms_mst', 'rooms');
            Schema::rename('units_mst', 'units');
    }
};
