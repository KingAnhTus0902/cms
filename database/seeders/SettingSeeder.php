<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings_mst')->truncate();
        DB::table('settings_mst')->insert([
            [
                'hospital_id' => 1,
                'default_name' => 'Clinic',
                'clinic_name' => 'Hệ thống quản lý phòng khám Clinic',
                'clinic_name_acronym' => 'PKĐK',
                'email' => 'clinic@jvb-corp.com',
                'logo' => '',
                'address' => 'Tòa nhà Roman Plaza - Đại Mễ - Tố Hữu - Nam Từ Liêm - Hà Nội',
                'phone' => '0123456789',
                'ministry_of_health' => 'Bộ y tế Hà Nội Việt Nam',
                'base_salary' => BASE_SALARY,
                'created_at' =>now(),
                'updated_at' =>now()
            ],
        ]);
    }
}
