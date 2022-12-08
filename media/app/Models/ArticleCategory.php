<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    public function articleCategorySearches()
    {
        return $this->hasMany(ArticleCategorySearch::class);
    }
}
