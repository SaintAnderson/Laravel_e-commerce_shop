<?php

namespace App\Services;

use App\Models\Coupon;

class CouponService
{
    private Coupon|null $coupon;

    public function coupon(string|null $coupon, bool $is_active = null): CouponService
    {
        $coupon = Coupon::where('code', '=', $coupon);
        if ($is_active !== null) {
            $coupon->where('is_active', '=', $is_active);
        }
        $this->coupon = $coupon->first();
        return $this;
    }

    public function setActive(string|null|bool $coupon = null, bool $is_active = false): CouponService
    {
        switch (gettype( $coupon )) {
            case 'boolean':
                $is_active = $coupon;
                $coupon = $this->coupon;
                break;
            default:
                $coupon = $coupon ? $this->coupon($coupon, $is_active) : $this->coupon;
                break;
        }
        if ($coupon) {
            $coupon->update(['is_active' => $is_active]);
            $this->coupon = Coupon::find($this->coupon->id);
        }
        return $this;
    }

    public function get(): Coupon|null
    {
        return $this->coupon;
    }

    public function activate(): CouponService {
        $this->setActive(false);
        return $this;
    }
}
