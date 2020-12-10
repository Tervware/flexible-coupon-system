<?php

namespace Database\Seeders;

use http\Env\Request;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
        CouponSeeder::class,
        RulesSeeder::class,
        DiscountSeeder::class,
        DiscountCouponsSeeder::class,
        RulesCouponsSeeder::class,
    ]);
    }
}
