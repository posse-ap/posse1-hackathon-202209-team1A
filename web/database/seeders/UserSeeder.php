<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name' => '小堺真季子',
                'email' => 'test@com',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ],
            [
                'name' => 'みきはる',
                'email' => 'test1@com',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ],
            [
                'name' => 'しゅん',
                'email' => 'user@com',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ],
        ];

        User::insert($data);
    }
}
