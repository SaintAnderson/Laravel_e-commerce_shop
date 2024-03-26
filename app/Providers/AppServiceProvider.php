<?php

namespace App\Providers;

use App\Services\AdvantageService;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\CartService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Services\SettingService;

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
        if (Schema::hasTable('advantages')) {
            view()->share('advantages', app(AdvantageService::class)->getAll());
        }

        if (Schema::hasTable('categories')) {
            view()->share('categoryMenuItems', app(CategoryService::class)->getActiveCategoriesWithActiveChildren());
        }

        if (Schema::hasTable('settings')) {
            view()->share([
                'shopPhone' => app(SettingService::class)->get('shop_phone'),
                'shopAddress' => app(SettingService::class)->get('shop_address'),
                'shopEmail' => app(SettingService::class)->get('shop_email'),
                'shopTitle' => app(SettingService::class)->get('shop_title'),
                'shopDescription'=> app(SettingService::class)->get('shop_description'),
            ]);
        }
    }
}
