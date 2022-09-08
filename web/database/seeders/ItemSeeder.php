<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummyImagePath = 'public/img/dummy.png';
        $path = Storage::putFile('public', new File($dummyImagePath));

        $data = [
            [
                'category_id' => 1,
                'name' => 'Goプログラミング実践入門　標準ライブラリでゼロからWebアプリを作る impress top gearシリーズ',
                'image_path' => Storage::putFile('public', new File('public/img/go.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 1,
                'name' => 'Rustプログラミング入門',
                'image_path' => Storage::putFile('public', new File('public/img/rust.jpg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 1,
                'name' => 'Go言語ハンズオン',
                'image_path' => Storage::putFile('public', new File('public/img/gohand.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 1,
                'name' => 'PHPフレームワーク Laravel実践',
                'image_path' => Storage::putFile('public', new File('public/img/laravel.jpg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 1,
                'name' => '苦しんで覚えるC言語',
                'image_path' => Storage::putFile('public', new File('public/img/c.jpg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 2,
                'name' => 'イシューからはじめよ──知的生産の「シンプルな本質」',
                'image_path' => Storage::putFile('public', new File('public/img/issue.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 2,
                'name' => '1日1話、読めば心が熱くなる365人の仕事の教科書',
                'image_path' => Storage::putFile('public', new File('public/img/ikikata.jpg')),
                'available_days' => 14,
                'is_public' => false,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 2,
                'name' => 'USJを劇的に変えた、たった1つの考え方 成功を引き寄せるマーケティング入門',
                'image_path' => Storage::putFile('public', new File('public/img/usj.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
            ],
            [
                'category_id' => 2,
                'name' => '人を動かす',
                'image_path' => Storage::putFile('public', new File('public/img/hito.webp')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
            ],
            [
                'category_id' => 2,
                'name' => 'メモの魔力',
                'image_path' => Storage::putFile('public', new File('public/img/memo.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
            ],
            [
                'category_id' => 3,
                'name' => 'Oculus Quest 2—完全ワイヤレスのオールインワンVRヘッドセット—256GB',
                'image_path' => Storage::putFile('public', new File('public/img/oculas.jpg')),
                'available_days' => 14,
                'is_public' => false,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 5,
                'name' => 'グレートギャツビー',
                'image_path' => Storage::putFile('public', new File('public/img/great.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
            ],
            [
                'category_id' => 5,
                'name' => '西の魔女が死んだ',
                'image_path' => Storage::putFile('public', new File('public/img/nisi.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
            ],
            [
                'category_id' => 5,
                'name' => '羊と鋼の森',
                'image_path' => Storage::putFile('public', new File('public/img/hituji.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
            ],
            [
                'category_id' => 5,
                'name' => '何者',
                'image_path' => Storage::putFile('public', new File('public/img/nani.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 6,
                'name' => 'アオアシ',
                'image_path' => Storage::putFile('public', new File('public/img/aoasi.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 6,
                'name' => '女の園の星',
                'image_path' => Storage::putFile('public', new File('public/img/hosi.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
            ],
            [
                'category_id' => 6,
                'name' => 'ちはやふる',
                'image_path' => Storage::putFile('public', new File('public/img/tihaya.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
            ],
            [
                'category_id' => 6,
                'name' => 'アオハライド',
                'image_path' => Storage::putFile('public', new File('public/img/ao.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-09-05",
            ],
            [
                'category_id' => 7,
                'name' => 'ペン',
                'image_path' => Storage::putFile('public', new File('public/img/pen.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
            ],
            [
                'category_id' => 7,
                'name' => '消しゴム',
                'image_path' => Storage::putFile('public', new File('public/img/kesi.png')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
            ],
            [
                'category_id' => 7,
                'name' => '定規',
                'image_path' => Storage::putFile('public', new File('public/img/jougi.jpeg')),
                'available_days' => 14,
                'is_public' => true,
                'provider' => '株式会社アンチパターン',
                'created_at' => "2022-02-15",
            ],
        ];

        Item::insert($data);
    }
}
