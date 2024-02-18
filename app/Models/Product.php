<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\{HasSlug, SlugOptions};

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'seller_id',
        'category_id',
        'article',
        'description',
        'count',
        'order',
        'price',
        'old_price',
        'is_active'
    ];
//
//    protected function discount(): Attribute
//    {
//        function calculateDiscountPercentage($oldPrice, $newPrice) {
//            if ($oldPrice == 0) {
//                return 0;
//            }
//
//            $discount = (($oldPrice - $newPrice) / $oldPrice) * 100;
//
//            return round($discount, 2);
//        }
//        return Attribute::make(
//            get: fn (int $oldPrice, int $newPrice) => calculateDiscountPercentage($oldPrice, $newPrice),
//        );
//    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }
}
