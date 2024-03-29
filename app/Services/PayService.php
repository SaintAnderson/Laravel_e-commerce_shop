<?php

namespace App\Services;

use App\Enums\CouponEnum;
use App\Facades\CouponFacade;
use App\Models\Coupon;

class PayService
{
    private float $price = 0;

    public function getPrice(): float
    {
        return $this->price;
    }

    public function addPrice(float $price): PayService
    {
        $this->price += $price;
        return $this;
    }

    public function setPrice(float $price): PayService
    {
        $this->price = $price;
        return $this;
    }

    public function removePrice(float $price): PayService
    {
        $this->price = $price;
        return $this;
    }

    public function coupon(Coupon|null $coupon): PayService
    {
        if ($coupon) {
            switch ($coupon->type) {
                case CouponEnum::Sum->value:
                    $price = $this->getPrice() - $coupon->amount;
                    if ($price >= env('MIN_PRICE', 0)) {
                        $this->setPrice($price);
                    } else {
                        $coupon->update(['is_active' => true]);
                    }
                    break;
                case CouponEnum::Precent->value:
                    $this->removePrice(Math::precent($this->getPrice(), $coupon->amount));
                    break;
                default:
                    break;
            }
        }
        return $this;
    }
}
