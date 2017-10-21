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

// Route::get('/dashboard', 'DashboardController@index');
// Route::get('/admin/dashboard', 'DashboardController@adminDashboard');

Route::get('/dashboard', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);
Route::get('admin/dashboard', ['uses' => 'DashboardController@adminDashboard', 'as' => 'admin.dashboard']);
