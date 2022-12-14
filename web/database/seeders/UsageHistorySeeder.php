<?php

namespace Database\Seeders;

use App\Models\UsageHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsageHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'item_id' => 1,
                'is_returned' => true,
                'start_at' => "2022-09-01",
                'return_at' => "2022-09-06",
                'created_at' => "2022-09-01",
            ],
            [
                'user_id' => 1,
                'item_id' => 2,
                'is_returned' => false,
                'start_at' => "2022-09-03",
                'return_at' => "2022-09-14",
                'created_at' => "2022-09-03",
            ],
            [
                'user_id' => 1,
                'item_id' => 3,
                'is_returned' => false,
                'start_at' => "2022-09-07",
                'return_at' => "2022-09-14",
                'created_at' => "2022-09-07",
            ],
            [
                'user_id' => 2,
                'item_id' => 1,
                'is_returned' => true,
                'start_at' => "2022-09-07",
                'return_at' => "2022-09-14",
                'created_at' => "2022-09-07",
            ],
            [
                'user_id' => 3,
                'item_id' => 1,
                'is_returned' => true,
                'start_at' => "2022-02-07",
                'return_at' => "2022-02-14",
                'created_at' => "2022-02-07",
            ],
            [
                'user_id' => 3,
                'item_id' => 1,
                'is_returned' => true,
                'start_at' => "2021-02-07",
                'return_at' => "2021-02-14",
                'created_at' => "2021-02-07",
            ],
            [
                'user_id' => 2,
                'item_id' => 1,
                'is_returned' => true,
                'start_at' => "2021-02-15",
                'return_at' => "2021-02-22",
                'created_at' => "2021-02-15",
            ],
            [
                'user_id' => 2,
                'item_id' => 4,
                'is_returned' => true,
                'start_at' => "2020-02-15",
                'return_at' => "2020-02-22",
                'created_at' => "2020-02-15",
            ],
            [
                'user_id' => 2,
                'item_id' => 3,
                'is_returned' => true,
                'start_at' => "2022-05-15",
                'return_at' => "2022-05-22",
                'created_at' => "2022-05-15",
            ],
            [
                'user_id' => 3,
                'item_id' => 5,
                'is_returned' => false,
                'start_at' => "2022-09-01",
                'return_at' => "2022-09-22",
                'created_at' => "2022-05-15",
            ],
            [
                'user_id' => 3,
                'item_id' => 9,
                'is_returned' => false,
                'start_at' => "2022-09-05",
                'return_at' => "2022-09-09",
                'created_at' => "2022-09-15",
            ],
            [
                'user_id' => 3,
                'item_id' => 4,
                'is_returned' => false,
                'start_at' => "2022-09-05",
                'return_at' => "2022-09-06",
                'created_at' => "2022-09-15",
            ],
            [
                'user_id' => 3,
                'item_id' => 7,
                'is_returned' => false,
                'start_at' => "2022-09-05",
                'return_at' => "2022-09-11",
                'created_at' => "2022-09-15",
            ],
            [
                'user_id' => 3,
                'item_id' => 10,
                'is_returned' => false,
                'start_at' => "2022-09-05",
                'return_at' => "2022-09-11",
                'created_at' => "2022-09-15",
            ],
            [
                'user_id' => 3,
                'item_id' => 6,
                'is_returned' => false,
                'start_at' => "2022-09-05",
                'return_at' => "2022-09-10",
                'created_at' => "2022-09-15",
            ],
            [
                'user_id' => 1,
                'item_id' => 11,
                'is_returned' => true,
                'start_at' => "2020-09-08",
                'return_at' => "2020-09-10",
                'created_at' => "2020-09-01",
            ],
            [
                'user_id' => 3,
                'item_id' => 12,
                'is_returned' => false,
                'start_at' => "2022-09-08",
                'return_at' => "2022-09-10",
                'created_at' => "2022-09-01",
            ],
            [
                'user_id' => 3,
                'item_id' => 16,
                'is_returned' => false,
                'start_at' => "2022-09-08",
                'return_at' => "2022-09-10",
                'created_at' => "2022-09-01",
            ],
        ];

        UsageHistory::insert($data);
    }
}
