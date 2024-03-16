<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\{Builder, Model, Relations\BelongsToMany, Relations\HasMany};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\{HasSlug, SlugOptions};

/**
 * @method static limited()
 * @method static where(string $string, string $slug)
 * @method static whereIn()
 */
class Product extends Model
{
    use HasFactory, HasSlug, CrudTrait;

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
    public function parentId(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id');
    }
    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'category_id');
    }
    /**
     * @return BelongsToMany
     */
    public function specifications(): BelongsToMany
    {
        return $this->belongsToMany(Specification::class, 'specification_product')->withPivot('value');
    }
}
