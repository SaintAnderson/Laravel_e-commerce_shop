<?php

namespace App\Facades;

use App\Services\PayService;
use Illuminate\Support\Facades\Facade;

class PayFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return PayService::class;
    }
}
