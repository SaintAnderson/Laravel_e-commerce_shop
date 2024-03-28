<?php

namespace App\Services;

class Math
{
    public static function precent(float $number, float $precent): float
    {
        return $number - $number / $precent;
    }
}
