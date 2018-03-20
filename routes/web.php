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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('/setlocale', 'HomeController@locale');

Route::get('/projects', 'ProjectsController@index');

Route::get('/publications', 'PublicationsController@index');

Route::get('/practices', 'PracticesController@index');

Route::get('/statistics', 'StatisticsController@index');

Route::get('/about', 'AboutController@index');

// CMS 
Route::get('/dashboard', 'DashboardController@index');

