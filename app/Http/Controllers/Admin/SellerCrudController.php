<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SellerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SellerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SellerCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Seller::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/seller');
        CRUD::setEntityNameStrings('продавца', 'Продавцы');
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
        CRUD::column('description')->type('text')->label('Описание');
        CRUD::column('phone')->type('int')->label('Телефон');
        CRUD::column('email')->type('text')->label('Email');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(SellerRequest::class);
        CRUD::field('title')->type('text')->label('Название');
        CRUD::field('description')->type('text')->label('Описание');
        CRUD::field('phone')->type('int')->label('Телефон');
        CRUD::field('email')->type('text')->label('Email');
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
