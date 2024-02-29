<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\CartService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryService::class, function () {
            return new CategoryService();
        });
        $this->app->bind(ProductService::class, function () {
            return new ProductService();
        });
        $this->app->bind(CartService::class, function () {
            return new CartService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('categories')) {
            view()->share('categoryMenuItems', app(CategoryService::class)->getActiveCategoriesWithActiveChildren());
        }
    }
}
