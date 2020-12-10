<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountCouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('coupons_coupon_discount_types')->insert([

             ['coupon_id' => 1, 'discount_type_id' => 1, 'discount_value' => 10 ],

             ['coupon_id' => 2, 'discount_type_id' => 2, 'discount_value' => 2 ],


             ['coupon_id' => 3, 'discount_type_id' => 1, 'discount_value' => 10 ],
             ['coupon_id' => 3, 'discount_type_id' => 2, 'discount_value' => 10 ],


             ['coupon_id' => 4, 'discount_type_id' => 1, 'discount_value' => 10 ],
             ['coupon_id' => 4, 'discount_type_id' => 2, 'discount_value' => 10 ],
        ]);
    }
}
