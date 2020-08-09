<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@show')
    ->where('id', '\d+')
    ->name('news.show');
//for admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\IndexController@index')
        ->name('admin');
    Route::get('/news', 'Admin\NewsController@index')
        ->name('admin.news');
    Route::get('/news/create', 'Admin\NewsController@create')
        ->name('admin.news.create');
    Route::get('/news/{id}/edit', 'Admin\NewsController@edit')
        ->where('id', '\d+')
        ->name('admin.news.edit');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
