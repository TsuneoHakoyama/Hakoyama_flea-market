<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'Dutsan',
        ];
        DB::table('companies')->insert($param);
        $param = [
            'name' => 'Toyota',
        ];
        DB::table('companies')->insert($param);
        $param = [
            'name' => 'Mercedes-Benz',
        ];
        DB::table('companies')->insert($param);
        $param = [
            'name' => 'Lamborghini',
        ];
        DB::table('companies')->insert($param);
    }
}
