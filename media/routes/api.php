<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('article-list', 'ApiArticleController@article_list');
Route::get('article-single/{article_id}', 'ApiArticleController@article_single');
Route::get('category', 'ApiArticleController@get_category');
Route::get('article-by-category/{article_id}', 'ApiArticleController@article_category_search');
Route::get('article-sort-new', 'ApiArticleController@sort_new');
Route::get('article-sort-view', 'ApiArticleController@sort_view');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
