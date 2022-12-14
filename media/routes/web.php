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



Route::get('/', 'App\Http\Controllers\ArticleController@top')->name('top');
Route::get('/making', 'App\Http\Controllers\ArticleController@making')->name('making');
Route::get('/test', 'App\Http\Controllers\ArticleResourceController@test')->name('test');




Route::group(['prefix' => 'article', 'as' => 'article.'],function () {
  Route::get('/', 'App\Http\Controllers\ArticleController@index')->name('index');
  Route::get('/show/{article_id}', 'App\Http\Controllers\ArticleController@show')->name('show');
  Route::get('/article-category-search/{category_slug}','App\Http\Controllers\ArticleController@article_category_search')->name('article-category-search');
  Route::get('sort_new', 'ArticleController@sort_new')->name('sort_new');
  Route::get('sort_view', 'ArticleController@sort_view')->name('sort_view');
  Route::get('/article_category_search/{id}', 'App\Http\Controllers\ArticleResourceController@article_category_search')->name('article_category_search');
});



Route::group(['prefix' => 'admin' , 'as'=> 'admin.'], function () {
  Route::get('login', function () {
    return view('admin.admin_login');
  })->middleware('guest:admin');

  Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('dashboard', function () {
      return view('admin.admin_dashboard');
    });
    Route::get('article/sort_new', 'ArticleResourceController@sort_new')->name('article.sort_new');
    Route::get('article/article_category_search/{id}', 'App\Http\Controllers\ArticleResourceController@article_category_search')->name('article.article-category-search');
    Route::resource('article', 'ArticleResourceController');


    Route::get('register', 'App\Http\Controllers\RegisterController@adminRegisterForm');
    Route::post('register', 'App\Http\Controllers\RegisterController@adminRegister')->name('register');


  });

  Route::get('logout', 'App\Http\Controllers\LoginController@adminLogout')->name('logout');

  Route::post('login', 'App\Http\Controllers\LoginController@adminLogin')->name('login');

});
