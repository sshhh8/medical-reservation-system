<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');

        $this->crud->setTitle('患者一覧');
        $this->crud->setHeading('患者一覧');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->data['breadcrumbs'] = [
            'ダッシュボード' => backpack_url('dashboard'),
            '患者一覧' => backpack_url('user'),
            '一覧' => false,
        ];

        CRUD::column('id')->label('患者番号');
        CRUD::column('name')->label('患者氏名');
        CRUD::column('category_id')->label('診療科');
        CRUD::column('email')->label('email');
        CRUD::column('postal_cord')->label('郵便番号');
        CRUD::column('address')->label('住所');
        CRUD::column('phone')->label('電話番号');


        // CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->data['breadcrumbs'] = [
            'ダッシュボード' => backpack_url('dashboard'),
            '患者一覧' => backpack_url('user'),
            '一覧' => false,
        ];

        CRUD::field('name')->label('患者氏名');
        CRUD::field('category_id')->label('診療科');
        CRUD::field('email')->label('email');
        CRUD::field('postal_cord')->label('郵便番号');
        CRUD::field('address')->label('住所');
        CRUD::field('phone')->label('電話番号');
        CRUD::field('password')->label('パスワード');

        // CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
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
