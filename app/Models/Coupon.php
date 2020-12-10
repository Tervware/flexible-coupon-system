<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected  $with = ["discountTypes", "rules"];

    /**
     * @return discountTypes
     */
    public  function discountTypes()
    {
        return $this->belongsToMany(CouponDiscountType::class, 'coupons_coupon_discount_types', 'coupon_id', 'discount_type_id')->withPivot('discount_value');
    }

    /**
     * @return rules
     */
    public  function rules()
    {
        return $this->belongsToMany(CouponRule::class, 'coupons_coupon_rules', 'coupon_id', 'rule_id')->withPivot('rule_value');
    }
}
