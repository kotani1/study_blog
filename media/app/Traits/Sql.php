<?php

namespace App\Traits;

use App\Models\ArticleCategorySearch;

trait Sql {

  public function articleCategorySearch() {
    // return ArticleCategorySearch::with(['article:id,title,description,view_count', 'articleCategory:id,name,slug']);
    return ArticleCategorySearch::select('article_category_searches.id','title', 'description', 'article_id', 'name', 'slug', 'view_count')
      ->join('articles', 'article_category_searches.article_id', '=', 'articles.id')
      ->join('article_categories', 'article_category_searches.article_category_id', '=', 'article_categories.id');
  }
}
