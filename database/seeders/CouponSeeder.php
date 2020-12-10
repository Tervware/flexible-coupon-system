<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert([
            ['code' => 'FIXED10'],
            ['code' => 'PERCENT10'],
            ['code' => 'MIXED10'],
            ['code' => 'REJECTED10'],
        ]);
    }
}
