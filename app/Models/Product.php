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
     * Список полей для получения отсортированных данных по запросу GET /products?sort=price или /products?sort=updated_at
     * или в обратном порядке GET /products?sort=-price или /products?sort=-updated_at
     * @return string[]
     */
    public static function getAllowedSorts(): array
    {
        return [
            'price',
            'updated_at'
        ];
    }

    /**
     * Список полей для фильтрации по диапазону цены, названию и продавцу.
     * Пример запрос: GET /products?filter[price_from_to]=8,26&filter[title]=smartphone&filter[seller]=dns
     * @return array
     */
    public static function getAllowedFilters(): array
    {
        return [
            AllowedFilter::scope('price_from_to'),
            AllowedFilter::scope('products_in_stock'),
            'title',
            'seller_id',
        ];
    }

    /**
     * @param Builder $builder
     * @param $from
     * @param $to
     * @return Builder
     */
    public function scopePriceFromTo(Builder $builder, $from, $to): Builder
    {
        return $builder->whereBetween('price', [$from, $to]);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeProductsInStock(Builder $query): Builder
    {
        return $query->where('count', '>', 0);
    }
}
