<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleCategorySearch;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = ArticleCategorySearch::get();
        $categories = ArticleCategory::get();
        return view('article.index', compact('articles', 'categories'));
    }

    public function show($_article_id)
    {
        $article = Article::find($_article_id);
        $view_count = $article['view_count'];
        $article->update([
            'view_count' => $view_count + 1,
        ]);
        return view('article.article_page', compact('article'));
    }

    public function article_category_search($_category_id)
    {
        $articles = ArticleCategorySearch::where('article_category_id', '=', $_category_id)->get();
        $categories = ArticleCategory::get();

        //記事の一件目を探す
        $a = $articles->first();

        //記事がないとき
        if (!isset($a)) {
            $articles = null;
        }
        return view('article.index', compact('articles', 'categories'));
    }

    public function sort_new()
    {
        $categories = ArticleCategory::get();
        $articles = ArticleCategorySearch::orderBy('id', 'desc')->get();
        return view('article.index', compact('articles', 'categories'));
    }
    public function sort_view()
    {
        $categories = ArticleCategory::get();
        $articles = ArticleCategorySearch::select()
        ->join('articles', 'article_category_searches.article_id', '=', 'articles.id')
        ->orderBy('articles.view_count', 'desc')
        ->get();
        return view('article.index', compact('articles', 'categories'));
    }
    public function top()
    {
        return view('site.top');
    }
    public function making()
    {

        return view('site.making');
    }

}
