<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CitySeeder::class,
            DistrictSeeder::class,
            FolkSeeder::class,
            OrganizationSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
//            NewsCategorySeeder::class,
            HospitalSeeder::class,
//            DesignatedServiceSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
