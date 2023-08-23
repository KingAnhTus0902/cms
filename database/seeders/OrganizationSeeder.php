<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('organizations_mst')->truncate();
        DB::table('organizations_mst')->insert([
            [
                'id' => 1,
                'name' => 'TYT - Trạm y tế'
            ],
            [
                'id' => 2,
                'name' => 'BV - Bệnh viện đa khoa'
            ],
            [
                'id' => 3,
                'name' => 'PK - Phòng khám đa khoa'
            ],
            [
                'id' => 4,
                'name' => 'BBVCSSK - Ban bảo vệ chăm sóc sức khỏe'
            ],
            [
                'id' => 5,
                'name' => 'BV - Bệnh viện chuyên khoa'
            ],
            [
                'id' => 6,
                'name' => 'YTCQ - Y tế cơ quan'
            ],
            [
                'id' => 7,
                'name' => 'BV - Bệnh viện YHCT'
            ],
            [
                'id' => 8,
                'name' => 'TTYT - Trung tâm y tế'
            ],
            [
                'id' => 9,
                'name' => 'NHS - Nhà hộ sinh'
            ],
            [
                'id' => 10,
                'name' => 'BX - Bệnh xá'
            ],
            [
                'id' => 11,
                'name' => 'PK - Phòng khám chuyên khoa'
            ],
            [
                'id' => 12,
                'name' => 'TTYTCK - Trung tâm y tế chuyên khoa'
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
