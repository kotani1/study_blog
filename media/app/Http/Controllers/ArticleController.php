<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleCategorySearch;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::get();
        $categories = ArticleCategory::get();
        return view('article.index', compact('articles', 'categories'));
    }
    
    public function show($article_id)
    {
        $article = Article::find($article_id);
        return view('article.detail', compact('article'));
    }
    public function test()
    {
        return view('article.test');
    }
    public function article_category_search(Request $request ,$category_id)
    {
        $articles_category = ArticleCategorySearch::where('article_category_id', '=',
        $category_id)->get();

        //記事の一件目を探す
        $a = $articles_category->first();

        //記事がないとき
        if (!isset($a)) {
            $articles_category = null;
        }
        return view('article.articleCategory', compact('articles_category','category_id'));
    }

    public function sort_newest(Request $request)
    {
        $category_id = $request->category_id;
        $articles_category = ArticleCategorySearch::where('article_category_id', '=', $category_id)->orderBy('id', 'desc')->get();
        return view('article.articleCategory', compact('articles_category', 'category_id'));
    }
}
