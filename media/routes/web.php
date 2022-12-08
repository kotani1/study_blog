<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

// Route::get('/', function () {
//     return view('welcome');
// // });
// Route::get('/', 'App\Http\Controllers\TopController@index')->name('top');
// Route::post('/create', 'App\Http\Controllers\TopController@create')->name('create');
// Route::get('/submit', 'App\Http\Controllers\TopController@submit')->name('submit');
// Route::get('/update/{id}', 'App\Http\Controllers\TopController@update')->name('update');
// Route::post('/update_exe/{id}', 'App\Http\Controllers\TopController@update_exe')->name('update_exe');
// Route::get('/delete/{id}', 'App\Http\Controllers\TopController@delete')->name('delete');
// Route::get('/detail/{id}', 'App\Http\Controllers\TopController@detail')->name('detail');




Route::get('/article', 'App\Http\Controllers\ArticleController@index')->name('article');
Route::get('/article/show/{article_id}', 'App\Http\Controllers\ArticleController@show')->name('article.show');
Route::get('/article/test', 'App\Http\Controllers\ArticleController@test')->name('test');
Route::get('/article/article-category-search/{category_slug}', 'App\Http\Controllers\ArticleController@article_category_search')->name('article.article-category-search');

Route::get('/article/article_category_search/{id}', 'App\Http\Controllers\ArticleResourceController@article_category_search')->name('article_category_search');



Route::group(['prefix' => 'admin' , 'as'=> 'admin.'], function () {
  Route::get('login', function () {
    return view('admin.admin_login'); // blade.php
  })->middleware('guest:admin');

  Route::get('logout', 'App\Http\Controllers\LoginController@adminLogout')->name('logout');

  Route::get('register', 'App\Http\Controllers\RegisterController@adminRegisterForm')->middleware('auth:admin');

  Route::get('dashboard', function () {
    return view('admin.admin_dashboard');
  })->middleware('auth:admin');

  Route::post('register', 'App\Http\Controllers\RegisterController@adminRegister')->middleware('auth:admin')->name('register');

  Route::post('login', 'App\Http\Controllers\LoginController@adminLogin')->name('login');

  Route::resource('articles', 'ArticleResourceController');
});
