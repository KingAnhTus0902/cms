<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'Giam-doc',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => Hash::make('admin@123'),
                'status' => ACTIVE,
                'description' => '',
                'phone' => '01234567891',
                'address' => 'Hà Nội',
                'position' => 'Giám đốc cao cấp',
                'department_id' => 1,
                'certificate' => '123-123-123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bác sỹ khám bệnh',
                'email' => 'examination_doctor@gmail.com',
                'username' => 'examination doctor',
                'password' => Hash::make('doctor@123'),
                'status' => ACTIVE,
                'description' => '',
                'phone' => '01234567891',
                'address' => 'Hà Nội',
                'position' => 'Bác sỹ cao cấp',
                'department_id' => 1,
                'certificate' => '123-123-123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bác sỹ chỉ định',
                'email' => 'referring_doctor@gmail.com',
                'username' => 'referring doctor',
                'password' => Hash::make('doctor@123'),
                'status' => ACTIVE,
                'description' => '',
                'phone' => '01234567891',
                'address' => 'Hà Nội',
                'position' => 'Bác sỹ cao cấp',
                'department_id' => 1,
                'certificate' => '123-123-123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Don-tiep',
                'email' => 'receptionist@gmail.com',
                'username' => 'receptionist',
                'password' => Hash::make('receptionist@123'),
                'status' => ACTIVE,
                'description' => '',
                'phone' => '01234567891',
                'address' => 'Hà Nội',
                'position' => 'Đón tiếp cao cấp',
                'department_id' => 1,
                'certificate' => '123-123-123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Duoc-sy',
                'email' => 'pharmacist@gmail.com',
                'username' => 'pharmacist',
                'password' => Hash::make('pharmacist@123'),
                'status' => ACTIVE,
                'description' => '',
                'phone' => '01234567891',
                'address' => 'Hà Nội',
                'position' => 'Dược sỹ cao cấp',
                'department_id' => 1,
                'certificate' => '123-123-123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ke-toan',
                'email' => 'accounting@gmail.com',
                'username' => 'accounting',
                'password' => Hash::make('accounting@123'),
                'status' => ACTIVE,
                'description' => '',
                'phone' => '01234567891',
                'address' => 'Hà Nội',
                'position' => 'Kế toán cao cấp',
                'department_id' => 1,
                'certificate' => '123-123-123',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
