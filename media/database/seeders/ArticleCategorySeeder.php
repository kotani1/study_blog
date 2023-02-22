<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleCategory::create([
            'name' => 'HTML',
            'slug' => 'html',
            'parent_article_category_id' => 0

        ]);
        ArticleCategory::create([
            'name' => 'CSS',
            'slug' => 'css',
            'parent_article_category_id' => 0

        ]);
        ArticleCategory::create([
            'name' => 'JavaScript',
            'slug' => 'javascript',
            'parent_article_category_id' => 0

        ]);
        ArticleCategory::create([
            'name' => 'PHP',
            'slug' => 'php',
            'parent_article_category_id' => 0
        ]);
        ArticleCategory::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
            'parent_article_category_id' => 4
        ]);
        ArticleCategory::create([
            'name' => 'Sass',
            'slug' => 'sass',
            'parent_article_category_id' => 2
        ]);
        ArticleCategory::create([
            'name' => 'その他',
            'slug' => 'etc',
            'parent_article_category_id' => 0
        ]);
    }
}
