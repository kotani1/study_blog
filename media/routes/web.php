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
// Route::get('/', 'TopController@index')->name('top');
// Route::post('/create', 'TopController@create')->name('create');
// Route::get('/submit', 'TopController@submit')->name('submit');
// Route::get('/update/{id}', 'TopController@update')->name('update');
// Route::post('/update_exe/{id}', 'TopController@update_exe')->name('update_exe');
// Route::get('/delete/{id}', 'TopController@delete')->name('delete');
// Route::get('/detail/{id}', 'TopController@detail')->name('detail');



Route::get('/', 'ArticleController@top')->name('top');
Route::get('/making', 'ArticleController@making')->name('making');
Route::get('/test', 'AdminArticleResourceController@test')->name('test');



//記事に関して
Route::group(['prefix' => 'article', 'as' => 'article.'],function () {
  Route::get('/', 'ArticleController@article_list')->name('index');
  Route::get('single', 'ArticleController@article_single')->name('show');
  Route::get('/category-search','ArticleController@article_category_search');
  Route::get('sort-new', 'ArticleController@sort_new')->name('sort_new');
  Route::get('sort-view', 'ArticleController@sort_view')->name('sort_view');
});



Route::group(['prefix' => 'admin' , 'as'=> 'admin.'], function () {
  Route::get('login', function () {
    return view('admin.admin_login');
  })->middleware('guest:admin');

  Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('dashboard', function () {
      return view('admin.admin_dashboard');
    });
    Route::get('article/sort_new', 'AdminArticleResourceController@sort_new')->name('article.sort_new');
    Route::get('article/article_category_search/{id}', 'AdminArticleResourceController@article_category_search')->name('article.article-category-search');
    Route::resource('article', 'AdminArticleResourceController');


    Route::get('register', 'RegisterController@adminRegisterForm');
    Route::post('register', 'RegisterController@adminRegister')->name('register');


  });

  Route::get('logout', 'LoginController@adminLogout')->name('logout');

  Route::post('login', 'LoginController@adminLogin')->name('login');

});
Route::get('tes', 'LoginController@tes');
