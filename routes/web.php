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

Route::get('/', 'NewsController@index')
    ->name('home');
Route::get('/news/{id}', 'NewsController@show')
    ->where('id', '\d+')
    ->name('news.show');
Route::get('/news/{id}/getComments', 'NewsController@getComments')
    ->where('id', '\d+')
    ->name('news.getComment');
Route::post('/news/{id}/addComment', 'NewsController@addComment')
    ->where('id', '\d+')
    ->name('news.addComment');

Route::get('/news/category/{id}', 'CategoriesController@oneCategory')
    ->where('id', '\d+')
    ->name('categories.category');

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

Route::match(['post', 'get'], '/dataLandingForm', 'DataLandingController@index')
    ->name('dataLandingForm');

Auth::routes();
