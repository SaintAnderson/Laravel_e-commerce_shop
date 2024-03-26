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
    public function setup()
    {
        CRUD::setModel(Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
     CRUD::column('title')->type('text')->label('Название продукта');
     CRUD::column('title')->type('text')->label('Название продукта');
     CRUD::column('seller_id')->type('select')->entity('seller')->name('title')->label('ID продавца');
//     CRUD::column('seller_id')->type('number')->label('ID продавца');
      CRUD::column('category_id')->type('select')->entity('category')->name('id')->label('ID категории');
//        CRUD::column('category_id')->type('number')->label('ID категории');
     CRUD::column('article')->type('text')->label('Артикл');
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
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);
        CRUD::field('title')->type('text')->label('Название продукта')->attributes(['required'=>'required']);
        CRUD::field([
            'label' => "ID продавца",
            'type' => 'select',
            'name' => 'seller', // the method that defines the relationship in your Model
            'entity' => 'seller', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'pivot' => false, // on create&update, do you need to add/delete pivot table entries?
        ]);
//        CRUD::field('seller_id')->type('number')->label('ID продавца');
        CRUD::field([
            'label' => "ID категории",
            'type' => 'select',
            'name' => 'category', // the method that defines the relationship in your Model
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot' => false, // on create&update, do you need to add/delete pivot table entries?
        ]);
//        CRUD::field('category_id')->type('number')->label('ID категории');
        CRUD::field('article')->type('text')->label('Артикл');
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
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
