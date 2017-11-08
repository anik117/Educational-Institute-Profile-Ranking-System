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

// Route::get('/', 'PagesController@index');
Route::get('/', ['uses' => 'PagesController@index', 'as' => 'home']);

Auth::routes();


Route::group(['middleware'=>['role:deo','auth']],function(){
	Route::view('/admin','admin.dashboard');
	Route::resource('admin/permission', 'Admin\\PermissionController');
	Route::resource('admin/role', 'Admin\\RoleController');
	Route::resource('admin/user', 'Admin\\UserController');
	Route::resource('admin/area', 'Admin\\AreaController');
	Route::resource('admin/school', 'Admin\\SchoolController');
});

Route::get('/dashboard', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);

Route::get('/area/{id}', 'AreaShowController@show');
Route::get('/area', 'AreaShowController@index');