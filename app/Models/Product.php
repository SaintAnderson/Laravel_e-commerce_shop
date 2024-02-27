<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model, Relations\HasMany};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\{HasSlug, SlugOptions};
use Spatie\QueryBuilder\AllowedFilter;

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
    public function productViews(): HasMany
    {
        return $this->hasMany(ProductView::class);
    }

    /**
     * @return string[]
     */
    public static function getAllowedSorts(): array
    {
        return [
            'price',
            'updated_at',
        ];
    }

    /**
     * @return array
     */
    public static function getAllowedFilters(): array
    {
        return [
            AllowedFilter::scope('price_from_to'),
            'title',
            AllowedFilter::scope('seller'),
            AllowedFilter::scope('in_stock'),
        ];
    }

    public function scopePriceFromTo(Builder $builder, $from, $to): Builder
    {
        return $builder->whereBetween('price', [$from, $to]);
    }

    public function scopeSeller(Builder $builder, $id): Builder
    {
        return $builder->where('seller_id', $id);
    }

    public function scopeInStock(Builder $builder): Builder
    {
        return $builder->where('count', '>', 0);
    }
}
