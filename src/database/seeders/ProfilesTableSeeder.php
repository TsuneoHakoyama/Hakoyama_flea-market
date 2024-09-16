<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param =[
            'user_id' => 1,
            'name' => 'テスト一郎',
            'postcode' => '1234567',
            'address' => '東京都渋谷区神南'
        ];
        DB::table('profiles')->insert($param);
        $param = [
            'user_id' => 2,
            'name' => 'テスト次郎',
            'postcode' => '1234567',
            'address' => '東京都渋谷区神南'
        ];
        DB::table('profiles')->insert($param);
        $param = [
            'user_id' => 3,
            'name' => 'テスト三郎',
            'postcode' => '1234567',
            'address' => '東京都渋谷区神南'
        ];
        DB::table('profiles')->insert($param);
    }
}
