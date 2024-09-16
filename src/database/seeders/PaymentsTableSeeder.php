<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'method' => 'カード払い'
        ];
        DB::table('payments')->insert($param);
        $param = [
            'method' => 'コンビニ払い'
        ];
        DB::table('payments')->insert($param);
        $param = [
            'method' => '銀行振込'
        ];
        DB::table('payments')->insert($param);
    }
}
