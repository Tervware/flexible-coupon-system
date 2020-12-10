<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('coupon_rules')->insert([
             ['name' => 'cart total price must be greater than $X before discounts' , 'slug' => 'max_nondiscounted_amount', 'inputType' => 'number'],
             ['name' => 'cart must contain at least N items' , 'slug' => 'least_number_of_items', 'inputType' => 'number'],
        ]);

    }
}
