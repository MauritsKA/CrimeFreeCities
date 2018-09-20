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

Route::post('/setlocale', 'HomeController@locale');

// Pages 
Route::get('/', 'HomeController@display')->name('home');

Route::get('/projects', 'ProjectsController@display');

Route::get('/publications', 'PublicationsController@display');

Route::get('/practices', 'PracticesController@display');

Route::get('/statistics', 'StatisticsController@display');

Route::get('/about', 'AboutController@display');

// CMS 
Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/texts', 'DashboardController@texts');
Route::get('/dashboard/facts', 'DashboardController@facts');

Route::get('/dashboard/settings', 'DashboardController@settings');
Route::post('/dashboard/settings/email', 'DashboardController@email');
Route::post('/dashboard/settings/password', 'DashboardController@password');

Route::get('/dashboard/images', 'ImagesController@index');
Route::post('/dashboard/images', 'ImagesController@add');
Route::post('/dashboard/images/edit/{old_image}', 'ImagesController@edit');
Route::get('/dashboard/images/delete/{old_image}', 'ImagesController@delete');

Route::get('/dashboard/projects', 'ProjectsController@index');
Route::post('/dashboard/projects', 'ProjectsController@add');
Route::post('/dashboard/projects/edit/{project}', 'ProjectsController@edit');
Route::get('/dashboard/projects/delete/{project}', 'ProjectsController@delete');

Route::get('/download/{publication}', 'PublicationsController@downloadpublication');
Route::get('/dashboard/publications', 'PublicationsController@index');
Route::post('/dashboard/publications', 'PublicationsController@add');
Route::post('/dashboard/publications/edit/{publication}', 'PublicationsController@edit');
Route::get('/dashboard/publications/delete/{publication}', 'PublicationsController@delete');

Route::get('/dashboard/statistics', 'StatisticsController@index');
Route::post('/dashboard/statistics', 'StatisticsController@add');
Route::post('/dashboard/statistics/edit/{statistic}', 'StatisticsController@edit');
Route::get('/dashboard/statistics/delete/{statistic}', 'StatisticsController@delete');

Route::get('/dashboard/practices', 'PracticesController@index');
Route::post('/dashboard/practices', 'PracticesController@add');
Route::post('/dashboard/practices/edit/{practice}', 'PracticesController@edit');
Route::get('/dashboard/practices/delete/{practice}', 'PracticesController@delete');