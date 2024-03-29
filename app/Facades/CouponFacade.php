<?php

namespace App\Facades;

use App\Services\CouponService;
use Illuminate\Support\Facades\Facade;

class CouponFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CouponService::class;
    }
}
