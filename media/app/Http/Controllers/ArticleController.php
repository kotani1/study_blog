<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleCategorySearch;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    public function article_list()
    {
        return view('articles.index');
    }

    public function article_single()
    {
        return view('articles.single');
    }

    public function article_category_search()
    {
        return view('articles.by_category');
    }

    public function sort_new()
    {
        $categories = ArticleCategory::get();
        $articles = ArticleCategorySearch::orderBy('id', 'desc')->get();
        return view('articles.sort_new');
    }
    public function sort_view()
    {
        // $categories = ArticleCategory::get();
        // $articles = ArticleCategorySearch::select()
        // ->join('articles', 'article_category_searches.article_id', '=', 'articles.id')
        // ->orderBy('articles.view_count', 'desc')
        // ->get();
        return view('articles.sort_view',);
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
