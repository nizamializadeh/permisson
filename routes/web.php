<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('add_permission','admin\RoleController@index')->name('add_permission');
Route::get('','frontend\SiteController@index');
Route::post('save_role_permission','admin\RoleController@saveRolePermission')->name('save_role_permission');
Route::get('role_add','admin\RoleController@roleadd')->name('role_add');
Route::post('save_role_add','admin\RoleController@saveroleadd')->name('save_role_add');
Route::post('set-status','backend\AdminController@setStatus')->name('setStatus');
Route::group(['middleware' => 'user','prefix' => 'user'],function (){
    Route::post('/plan/added/{id}', 'backend\PlanSubscrubeController@subscribe');
    Route::resources([
        'product' => 'backend\ProductController',
        'image' => 'backend\ImageController',
        'plan' => 'backend\PlanController',
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

