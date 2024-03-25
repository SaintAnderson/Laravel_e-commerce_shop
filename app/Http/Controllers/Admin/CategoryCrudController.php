<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('category', 'Категории');
    }

    protected function setupListOperation()
    {
        CRUD::column('id')->type('number')->label('ID');
        CRUD::column('parent_id')->type('select')->entity('parentCategory')->name('parent_id')->label('Родительская категория');
        CRUD::column('name')->type('text')->label('Название');
        CRUD::column('order')->type('number')->label('Позиция');
        CRUD::column('is_active')->type('checkbox')->label('Активна');
        CRUD::column('is_pinned')->type('checkbox')->label('Закреплена');
        //todo загрузить картинку
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'name' => 'required|min:2',
        ]);

        CRUD::field([
            'label' => "Родительская категория",
            'type' => 'select',
            'name' => 'parentCategory', // the method that defines the relationship in your Model
            'entity' => 'parentCategory', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'pivot' => false, // on create&update, do you need to add/delete pivot table entries?
        ]);

        CRUD::field('name')->type('text')->label('Название')->attributes(['required' => 'required']);
        CRUD::field('order')->type('number')->label('Позиция');
        CRUD::field('is_active')->type('checkbox')->label('Активна');
        CRUD::field('is_pinned')->type('checkbox')->label('Закрепить');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
