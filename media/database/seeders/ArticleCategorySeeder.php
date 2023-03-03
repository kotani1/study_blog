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

        ]);
        ArticleCategory::create([
            'name' => 'CSS',
            'slug' => 'css',

        ]);
        ArticleCategory::create([
            'name' => 'JavaScript',
            'slug' => 'javascript',

        ]);
        ArticleCategory::create([
            'name' => 'PHP',
            'slug' => 'php',
        ]);
        ArticleCategory::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
            'parent_article_name' => 'PHP'
        ]);
        ArticleCategory::create([
            'name' => 'Sass',
            'slug' => 'sass',
            'parent_article_name' => 'CSS'
       ]);
        ArticleCategory::create([
            'name' => 'その他',
            'slug' => 'etc',
        ]);
    }
}
