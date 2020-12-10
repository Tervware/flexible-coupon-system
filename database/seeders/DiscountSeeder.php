<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupon_discount_types')->insert([
             ['name' => ' fixed amount off the total price', 'inputType' => 'number'],
             ['name' => 'Percent-off total price', 'inputType' => 'percent'],
        ]);

    }
}
