<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleCategorySearch;
use Illuminate\Support\Facades\Redis;

class ApiArticleController extends Controller
{
    public function article_list()
    {
        $articles = ArticleCategorySearch::with(['article:id,title,description', 'articleCategory:id,name,slug'])->get();
        return $articles;
    }
    public function article_single($article_id)
    {
        $article = Article::find($article_id);
        $view_count = $article['view_count'];
        $article->update([
            'view_count' => $view_count + 1,
        ]);
        return $article;
    }
    public function get_category()
    {
        $categories = ArticleCategory::get();
        return $categories;
    }

    public function article_category_search($category_id)
    {
        $articles = ArticleCategorySearch::with(['article:id,title,description', 'articleCategory:id,name,slug'])->where('article_category_id', '=', $category_id)->get();
        return $articles;
    }

    public function sort_new()
    {
        $articles = ArticleCategorySearch::with(['article:id,title,description', 'articleCategory:id,name,slug'])->orderBy('id', 'desc')->get();
        return $articles;
    }
    public function sort_view()
    {
        $articles = ArticleCategorySearch::select('title', 'description', 'article_id', 'name', 'slug')
            ->join('articles', 'article_category_searches.article_id', '=', 'articles.id')
            ->join('article_categories', 'article_category_searches.article_category_id', '=', 'article_categories.id')
            ->orderBy('articles.view_count', 'desc')
            ->get();

        // dd($articles);
        return $articles;
    }

}
