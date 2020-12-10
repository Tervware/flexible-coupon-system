<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RulesCouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons_coupon_rules')->insert([
             ['coupon_id' => 1, 'rule_id' => 1, 'rule_value' => 50 ],
             ['coupon_id' => 1, 'rule_id' => 2, 'rule_value' => 1 ],


             ['coupon_id' => 2, 'rule_id' => 1, 'rule_value' => 100 ],
             ['coupon_id' => 2, 'rule_id' => 2, 'rule_value' => 2 ],


             ['coupon_id' => 3, 'rule_id' => 1, 'rule_value' => 200 ],
             ['coupon_id' => 3, 'rule_id' => 2, 'rule_value' => 3 ],


             ['coupon_id' => 4, 'rule_id' => 1, 'rule_value' => 1000 ],
        ]);

    }
}
