<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasOne, BelongsTo, MorphMany};
use Spatie\Sluggable\{HasSlug, SlugOptions};

/**
 * @method static limited()
 */
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
        'price',
        'is_active',
        'is_limited_edition'
    ];

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

    public function photos(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }
    public function scopeLimited(Builder $query): Builder
    {
       return $query->where('is_limited_edition', '=', true);
    }

    public function discount(): HasOne
    {
        return $this->hasOne(ProductDiscount::class)->where('active_before', '>', date("Y-m-d H:i:s"));
    }
}
