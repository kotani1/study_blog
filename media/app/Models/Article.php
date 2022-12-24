<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at','deleted_at'];

    //スコープについて
    public function scopeFindId($query,$num)
    {
        return $query->where('id', '=', $num)->first();
    }
    //リレーション
    public function articleCategorySearch()
    {
        return $this->hasOne(ArticleCategorySearch::class);
    }
}
