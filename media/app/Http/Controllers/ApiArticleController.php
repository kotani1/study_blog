<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleCategorySearch;
use Illuminate\Support\Facades\Redis;
use App\Traits\Sql;

class ApiArticleController extends Controller
{
    use Sql;

    public function article_list()
    {
        $articles = $this->articleCategorySearch()->get();
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
        $articles = $this->articleCategorySearch()->where('article_category_id', '=', $category_id)->get();
        return $articles;
    }

    public function sort_new()
    {
        $articles = $this->articleCategorySearch()->orderBy('id', 'desc')->get();
        return $articles;
    }
    public function sort_view()
    {
        $articles = $this->articleCategorySearch()
            ->orderBy('articles.view_count', 'desc')
            ->get();
        return $articles;
    }

}
