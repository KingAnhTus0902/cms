<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FolkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('folks_mst')->truncate();
        DB::table('folks_mst')->insert([
            ['name' => 'Kinh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tày', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thái', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hoa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Khơ-me', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mường', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nùng', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'HMông', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dao', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gia-rai', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ngái', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ê-đê', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ba na', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Xơ-Đăng', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sán Chay', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cơ-ho', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chăm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sán Dìu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hrê', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mnông', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ra-glai', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Xtiêng', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bru-Vân Kiều', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thổ', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Giáy', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cơ-tu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gié Triêng', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mạ', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Khơ-mú', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Co', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tà-ôi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chơ-ro', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kháng', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Xinh-mun', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hà Nhì', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chu ru', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lào', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'La Chí', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'La Ha', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Phù Lá', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'La Hủ', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lự', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lô Lô', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chứt', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mảng', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pà Thẻn', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Co Lao', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cống', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bố Y', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Si La', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pu Péo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Brâu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ơ Đu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rơ măm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Người nước ngoài', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Không rõ', 'created_at' => now(), 'updated_at' => now()],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
