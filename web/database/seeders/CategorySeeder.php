<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => '書籍：技術書', 'created_at' => "2022-05-15"],
            ['name' => '書籍：ビジネス書', 'created_at' => "2022-05-15"],
            ['name' => 'エンターテインメント', 'created_at' => "2022-05-15"],
            ['name' => 'PC用品', 'created_at' => "2022-05-15"],
            ['name' => '書籍：小説', 'created_at' => "2022-04-15"],
            ['name' => '書籍：漫画', 'created_at' => "2022-05-15"],
        ];

        Category::insert($data);
    }
}
