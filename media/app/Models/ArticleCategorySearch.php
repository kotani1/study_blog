<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategorySearch extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}
