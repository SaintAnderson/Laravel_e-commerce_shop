<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\{HasSlug, SlugOptions};

class Category extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'is_active',
        'order',
        'is_pinned',
        'image_url'
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopePinned($query): mixed
    {
        return $query->where('is_pinned', true);
    }

    /**
     * @return HasMany
     */
    public function childCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
