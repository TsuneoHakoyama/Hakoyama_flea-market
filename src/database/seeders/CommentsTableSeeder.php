<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'item_id' => 1,
            'comment' => 'テスト'
        ];
        DB::table('comments')->insert($param);
        $param = [
            'user_id' => 2,
            'item_id' => 1,
            'comment' => 'テストテスト'
        ];
        DB::table('comments')->insert($param);
        $param = [
            'user_id' => 3,
            'item_id' => 1,
            'comment' => 'テストテストテスト'
        ];
        DB::table('comments')->insert($param);
    }
}
