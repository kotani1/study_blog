<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleCategorySearch;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    public function list()
    {
        return view('articles.index');
    }

    public function single()
    {
        return view('articles.single');
    }

    public function by_category()
    {
        return view('articles.by_category');
    }

    public function sort_new()
    {
        return view('articles.sort_new');
    }
    public function sort_view()
    {
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
