<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabaseStorageModel extends Model
{
    use HasFactory;

    protected $table = 'cart_storage';

    protected $fillable = [
        'id', 'cart_data',
    ];

    public function setCartDataAttribute($value)
    {
        $this->attributes['cart_data'] = base64_encode(serialize($value));
    }


    public function getCartDataAttribute($value)
    {
        return unserialize(base64_decode($value));
    }
}
