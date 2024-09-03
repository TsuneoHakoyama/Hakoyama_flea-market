<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'condition' => '新品',
        ];
        DB::table('conditions')->insert($param);
        $param = [
            'condition' => '中古品-良い',
        ];
        DB::table('conditions')->insert($param);
        $param = [
            'condition' => '中古品-普通',
        ];
        DB::table('conditions')->insert($param);
        $param = [
            'condition' => '中古品-傷あり',
        ];
        DB::table('conditions')->insert($param);
    }
}
