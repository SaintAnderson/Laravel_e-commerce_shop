<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property float $price
 */
class DeliveryMethods extends Model
{
    use HasFactory;

    const TYPE_DELIVERY_SELF = 1;
    const TYPE_DELIVERY_COURIER = 2;

    protected $fillable = [
        'name',
        'price',
    ];
}
