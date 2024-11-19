<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReservationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReservationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Reservation::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/reservation');
        CRUD::setEntityNameStrings('reservation', 'reservations');

        $this->crud->setTitle('予約管理');
        $this->crud->setHeading('予約管理');
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
            '予約管理' => backpack_url('reservation'),
            '一覧' => false,
        ];

        CRUD::column('category_id')
            ->label('診療科')
            ->type('select_grouped')
            ->entity('categories')
            ->attribute('name')
            ->model("App\Models\Category");
        CRUD::column('user_id')
            ->label('患者氏名')
            ->type('select_grouped')
            ->entity('users')
            ->attribute('name')
            ->model("App\Models\User");
        CRUD::column('date')->label('日付');
        CRUD::column('created_at')->label('作成日時')->format('YYYY-MM-DD HH:mm:ss');
        CRUD::column('updated_at')->label('更新日時')->format('YYYY-MM-DD HH:mm:ss');
        CRUD::column('questionnaires.content')
            ->label('問診票')
            ->type('textarea')
            ->entity('questionnaires')
            ->attribute('content')
            ->model("App\Models\Questionnaire");



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
            '予約管理' => backpack_url('reservation'),
            '新規登録' => false,
        ];
        $adminCategoryId = backpack_user()->category_id;

        CRUD::addField([
            'label'     => '診療科',
            'type'      => 'select',
            'name'      => 'category_id',
            'entity'    => 'categories',
            'attribute' => 'name',
            'model'     => "App\Models\Category",
            'options'   => (function ($query) use ($adminCategoryId) {
                return $query->where('id', $adminCategoryId)->get();
            }),
        ]);

        CRUD::addField([
            'label'     => '患者氏名',
            'type'      => 'select',
            'name'      => 'user_id',
            'entity'    => 'users',
            'attribute' => 'name',
            'model'     => "App\Models\User",
            'options'   => (function ($query) use ($adminCategoryId) {
                // Adminのカテゴリーに関連するユーザーのみを取得
                return $query->whereHas('categories', function ($q) use ($adminCategoryId) {
                    $q->where('id', $adminCategoryId);
                })->get();
            }),
        ]);
        CRUD::field('date')->label('日付');

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

    protected function autoSetupShowOperation()
    {
        $this->data['breadcrumbs'] = [
            'ダッシュボード' => backpack_url('dashboard'),
            '予約管理' => backpack_url('reservation'),
            '詳細' => false,
        ];

        $this->setupListOperation();
    }
}
