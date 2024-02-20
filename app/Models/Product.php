<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model, Relations\HasMany};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'order',
        'price',
        'is_active',
        'is_limited_edition',
        'old_price',
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
       return $query->where('is_limited_edition', true);
    }

    /**
     * @return HasMany
     */
    public function productView(): HasMany
    {
        return $this->hasMany(ProductView::class);
    }
}
