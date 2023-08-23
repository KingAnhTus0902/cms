<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HealthInsuranceCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('health_insurance_card_head_mst')->truncate();
        DB::table('health_insurance_card_head_mst')->insert([
            [
                'id' => 1,
                'code' => 1,
                'discount_right_line' => 0,
                'discount_opposite_line' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'code' => 2,
                'discount_right_line' => 0,
                'discount_opposite_line' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'code' => 3,
                'discount_right_line' => 0,
                'discount_opposite_line' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'code' => 4,
                'discount_right_line' => 0,
                'discount_opposite_line' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'code' => 5,
                'discount_right_line' => 0,
                'discount_opposite_line' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
