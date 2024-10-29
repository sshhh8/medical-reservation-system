<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::crud('admin', 'AdminCrudController');
        // 他の管理ルートもここに追加可能
    });
    Route::crud('admin', 'AdminCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('reservation', 'ReservationCrudController');
    Route::crud('category', 'CategoryCrudController');
}); // this should be the absolute last line of this file
/**
 * DO NOT ADD ANYTHING HERE.
 */
