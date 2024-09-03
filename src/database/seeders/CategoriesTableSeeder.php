<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'category' => '家電製品',
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => 'キッチン家電',
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '生活家電',
        ];
        DB::table('categories')->insert($param);
        $param = [
            'category' => '理美容家電',
        ];
        DB::table('categories')->insert($param);
    }
}
