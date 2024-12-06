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

        $this->crud->setTitle('患者管理');
        $this->crud->setHeading('患者管理');
        $this->crud->setSubheading('新規登録', 'create');
        $this->crud->setSubheading('編集', 'edit');
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
            '患者管理' => backpack_url('user'),
            '一覧' => false,
        ];

        CRUD::column('id')->label('患者番号');
        CRUD::column('name')->label('患者氏名')
            ->searchLogic(function ($query, $column, $searchTerm) {
                $query->orWhere('name', 'like', '%'.$searchTerm.'%');
            });
        CRUD::column('categories')
            ->label('診療科')
            ->type('select_multiple')
            ->entity('categories')
            ->attribute('name')
            ->model("App\Models\Category")
            ->searchLogic(function ($query, $column, $searchTerm) {
                $query->orWhereHas('categories', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', '%'.$searchTerm.'%');
                });
            });
        CRUD::column('email')->label('email');
        CRUD::column('postal_code')->label('郵便番号');
        CRUD::column('address')->label('住所');
        CRUD::column('phone')->label('電話番号');

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
            '患者管理' => backpack_url('user'),
            '新規登録' => false,
        ];

        CRUD::field('name')->label('患者氏名')->validationRules('required|string');;
        CRUD::field('categories')
            ->name('categories')
            ->type('checklist')
            ->label('診療科')
            ->entity('categories')
            ->attribute('name')
            ->model("App\Models\Category")
            ->pivot(true)
            ->allows_multiple(true)
            ->validationRules('required');
        CRUD::field('email')->label('email')->validationRules('required|email');
        CRUD::field('postal_code')->label('郵便番号')->validationRules('required|integer');
        CRUD::field('address')->label('住所')->validationRules('required');
        CRUD::field('phone')->label('電話番号')->validationRules('required|integer');
        CRUD::field('password')->type('password')->label('パスワード')->validationRules('required');

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
        $this->data['breadcrumbs'] = [
            'ダッシュボード' => backpack_url('dashboard'),
            '患者管理' => backpack_url('user'),
            '編集' => false,
        ];

        $this->setupCreateOperation();
    }

    protected function autoSetupShowOperation()
    {
        $this->data['breadcrumbs'] = [
            'ダッシュボード' => backpack_url('dashboard'),
            '患者管理' => backpack_url('user'),
            '詳細' => false,
        ];

        $this->setupListOperation();
    }
}
