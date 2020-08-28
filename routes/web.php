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
    ->name('news');
Route::get('/news/{id}/getComments', 'NewsController@getComments')
    ->where('id', '\d+')
    ->name('news.getComment');
Route::post('/news/{id}/addComment', 'NewsController@addComment')
    ->where('id', '\d+')
    ->name('news.addComment');

Route::get('/news/category/{category}', 'CategoriesController@show')
    ->name('category.show');

//for admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\NewsController@index')
        ->name('admin');
    Route::resource('/news', 'Admin\NewsController');
});

Route::match(['post', 'get'], '/dataLandingForm', 'DataLandingController@index')
    ->name('dataLandingForm');

Auth::routes();
