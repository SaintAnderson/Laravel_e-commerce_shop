<?php

namespace App\Providers;

use App\Services\CategoryService;
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
