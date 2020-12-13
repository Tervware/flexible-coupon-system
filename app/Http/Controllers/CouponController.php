<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $coupon = Coupon::firstWhere('code', $code);

        if(!isset($coupon)){
            return response()->json([
                'status' => 'error',
                'message' => 'Not Found',
            ]);
        }
        return response()->json([
                'status' => 'success',
                'data' => $coupon,
            ]);

    }


}
