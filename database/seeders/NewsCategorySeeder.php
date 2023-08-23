<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('news_categories_mst')->truncate();
        DB::table('news_categories_mst')->insert([
            ['name' => 'Y học thường thức', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tin tức sự kiện', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hỏi đáp y khoa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Khác', 'created_at' => now(), 'updated_at' => now()],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
