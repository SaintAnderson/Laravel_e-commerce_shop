<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    /**
     * @return Collection
     */
    public function getActiveCategoriesWithActiveChildren(): Collection
    {
        return Category::with(['childCategories' => function ($query) {
            $query->where('is_active', true)->orderBy('order');
        }])
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();
    }

    /**
     * @return mixed
     */
    public function getPinnedCategories(): mixed
    {
        return Category::pinned()->limit(3)->get();
    }
}
