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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group([
    "prefix" => "news",
    "namespace" => "News",
    "as" => "news."
],
    function () {
    Route::get("/", "NewsController@index")->name('news');
    Route::get("/categories", "NewsController@categories")->name('categories');
    Route::get("/add", ["uses" => "NewsController@addForm"]);
    Route::post("/addAction", ["uses" => "NewsController@add"]);
    Route::get("/{category}/{id}", ["uses" => "NewsController@newsOne"]);
    Route::get("/{category}", ["uses" => "NewsController@newsCategories"]);
    }
);
Route::get('/authentication', ['uses' => "AuthController@index"]);

