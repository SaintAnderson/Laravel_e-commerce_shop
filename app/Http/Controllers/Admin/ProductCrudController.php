<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Product;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void
    {
        CRUD::setModel(Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('товар', 'Товары');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::column('title')->type('text')->label('Название');
        CRUD::column('slug')->type('text')->label('Короткое название');
        CRUD::column('seller_id')->type('select')->entity('seller')->name('seller_id')->label('Продавец');
        CRUD::column('category_id')->type('select')->entity('category')->name('category_id')->label('Категория');
        CRUD::column('article')->type('text')->label('Артикул');
        CRUD::column('description')->type('text')->label('Описание');
        CRUD::column('image_url')->type('text')->label('Ссылка на картинку');
        CRUD::column('count')->type('number')->label('Количество');
        CRUD::column('price')->type('number')->label('Цена');
        CRUD::column('is_active')->type('checkbox')->label('Активный');
        CRUD::column('is_limited_edition')->type('checkbox')->label('Лимитированный');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::field('title')->type('text')->label('Название');
        CRUD::field('slug')->type('text')->label('Короткое название');
        CRUD::field('seller_id')->type('select')->entity('seller')->name('seller_id')->label('Продавец');
        CRUD::field('category_id')->type('select')->entity('category')->name('category_id')->label('Категория');
        CRUD::field('article')->type('text')->label('Артикул');
        CRUD::field('description')->type('text')->label('Описание');
        CRUD::field('image_url')->type('text')->label('Ссылка на картинку');
        CRUD::field('count')->type('number')->label('Количество');
        CRUD::field('price')->type('number')->label('Цена');
        CRUD::field('is_active')->type('checkbox')->label('Активный');
        CRUD::field('is_limited_edition')->type('checkbox')->label('Лимитированный');
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    /**
     * @return void
     */
    protected function setupShowOperation(): void
    {
        $this->setupListOperation();
    }
}
