<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService implements CategoryServiceInterface
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
}
