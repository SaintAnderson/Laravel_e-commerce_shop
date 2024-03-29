<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array)config('backpack.base.web_middleware', 'web'),
        (array)config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('category', 'CategoryCrudController');
    Route::crud('banner', 'BannerCrudController');
    Route::crud('database-storage-model', 'DatabaseStorageModelCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('product-view', 'ProductViewCrudController');
    Route::crud('review', 'ReviewCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('seller', 'SellerCrudController');
    Route::crud('setting', 'SettingCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('article', 'ArticleCrudController');
    Route::crud('advantage', 'AdvantageCrudController');
    Route::crud('specification', 'SpecificationCrudController');
    Route::get('import', 'ImportController@index')->name('import');
    Route::get('import_create', 'ImportController@create')->name('import.create');
    Route::post('import_upload', 'ImportController@upload')->name('import.upload');
    Route::crud('coupon', 'CouponCrudController');
}); // this should be the absolute last line of this file