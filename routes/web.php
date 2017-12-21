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
Route::get('/about', ['uses' => 'PagesController@about', 'as' => 'about']);

Auth::routes();

Route::group(['middleware'=>['role:deo','auth']],function(){
	Route::view('/admin','admin.dashboard');
	Route::resource('admin/permission', 'Admin\\PermissionController');
	Route::resource('admin/role', 'Admin\\RoleController');
	Route::resource('admin/user', 'Admin\\UserController');
	Route::resource('admin/area', 'Admin\\AreaController');
	Route::resource('admin/school', 'Admin\\SchoolController');
	Route::resource('admin/school-ranking-criteria', 'Admin\\SchoolRankingCriteriaController');
	Route::get('admin/chart', ['uses' => 'ChartController@chart', 'as' => 'chart']);
	Route::get('change/password', ['uses' => 'ChangePasswordController@viewChangePassword', 'as' => 'change.password']);
	Route::post('change/password', ['uses' => 'ChangePasswordController@changePassword', 'as' => 'change.password']);
});

Route::group(['middleware'=>['role:deo|ah|hm', 'auth']],function(){
	Route::view('/admin','admin.dashboard');
	Route::resource('admin/user', 'Admin\\UserController');
	Route::resource('admin/area', 'Admin\\AreaController');
	Route::resource('admin/school', 'Admin\\SchoolController');
	Route::resource('admin/school-ranking-criteria', 'Admin\\SchoolRankingCriteriaController');
	Route::get('change/password', ['uses' => 'ChangePasswordController@viewChangePassword', 'as' => 'change.password']);
	Route::post('change/password', ['uses' => 'ChangePasswordController@changePassword', 'as' => 'change.password']);
});

// Route::group(['middleware'=>['role:hm', 'auth']],function(){
// 	Route::view('/admin','admin.dashboard');
// 	Route::resource('admin/user', 'Admin\\UserController');
// 	Route::resource('admin/area', 'Admin\\AreaController');
// 	Route::resource('admin/school', 'Admin\\SchoolController');
// 	Route::resource('admin/school-ranking-criteria', 'Admin\\SchoolRankingCriteriaController');
// });


Route::get('/dashboard', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);
Route::get('/profile/{id}', ['uses' => 'ProfileController@index', 'as' => 'profile']);

Route::get('/area/{id}', 'AreaShowController@show');
Route::get('/area', 'AreaShowController@index');

Route::get('/school/{id}', 'SchoolShowController@show');
Route::get('/school', 'SchoolShowController@index');

Route::get('/pdf', 'PDFController@pdf');

Route::get('/generate_rank', 'PagesController@generateRank')->name('generate_rank');