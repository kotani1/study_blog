<?php

namespace Database\Seeders;


use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'title' => 'Laravelでリレーションシップの仕方',
            'body' => '<ul>
<li>Laravelのバージョン：9.41.0</li>
</ul>
<div class="block">
      <span class="subtitle" id="subtitle1">手順</span>
      <p>
      ・このサイトで使ったテーブルやモデルをもとに解説していきます！
      </p>
      <ol>
        <li>
          <p>リレーションシップとは？</p>
        </li>
        <li>
          <p>カラム名のつけ方</p>
        </li>
        <li>
          <p>modelの書き方</p>
        </li>
      </ol>
      <p>にわけて解説していきます。</p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle2">リレーションシップとは？</span>
      <p>
        二つのテーブルがあった時、そのテーブルどうしで関係性があることです。
     </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle3">カラム名のつけ方</span>
     <ul>
      <li>
        <p>articlesテーブル<br>
       <span class="red_line">id</span>,title,body...省略
        <p>
      </li>
      <li>
        <p>article_categoriesテーブル<br>
       <span class="blue_line">id</span>,name,slug...省略
        <p>
      </li>
      <li>
        <p>article_category_searchesテーブル<br>
       id,<span class="red_line">article_id</span>,<span class="blue_line"> article_category_id</span>...省略
        <p>
      </li>
     </ul>
     <p>色が同じなのが結びついてるところです。 <br>
     article_idやarticle_category_idのようにテーブル名_idとなっています。<br>
     こう書くことでなんとLaravel側が自動でリレーションしてくれます！<br>
     すごい便利ですね。
     </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle4">modelの書き方</span>
      <ul>
        <li>
          <p>1対1</p>
          <pre>
            <code class="laravel">
Article.php

    public function articleCategorySearch()
    {
        return $this->hasOne(ArticleCategorySearch::class);
    }



ArticleCategorySearch.php

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
            </code>
          </pre>
          <p> articleテーブルとarticle_category_searchesテーブルは1対1の関係です。<br><br>
            主テーブル(Article)は<br>
            $this->hasOne(結び付けたいテーブル名::class);<br><br>
            従テーブル(ArticleCategorySearch)は<br>
            $this->belongsTo(結び付けたいテーブル名::class);<br><br>
            ※メソッド名は単数形にしましょう。<br><br>
            実際にデータを取得してみます。<br>
            <span class="common_line">articleテーブル</span><br>
            <img src="/images/laravel/relationship1.png" alt=""><br><br>
            <span class="common_line">article_category_searchesテーブル</span><br>
            <img src="/images/laravel/relationship2.png" alt="">
            ※2行目です。<br>
            <p><span class="common_line">コード</span></p>
            <pre>
              <code>
$article_category_id =
Article::find(7)->articleCategorySearch['article_category_id'];
dd($article_category_id);
              </code>
            </pre>
            <p><span class="common_line">結果</span>
            <img src="/images/laravel/relationship3.png" alt="">
            article_category_idを取得できました。<br>
            従テーブルから主テーブルにアクセスするときも同じようにしたらできます。
            </p>
        </li>
        <br>
        <li>
          <p>1対多</p>
          <pre>
            <code class="laravel">
ArticleCategory.php

    public function articleCategorySearches()
    {
        return $this->hasMany(ArticleCategorySearch::class);
    }



ArticleCategorySearch.php

    public function articleCategory()
    {
        return $this->belongsTo(Article::class);
    }
            </code>
          </pre>
          <p>article_categoriesテーブルとarticle_category_searchesテーブルは1対多の関係です。<br><br>
            主テーブル(ArticleCategory)は<br>
            $this->hasMany(結び付けたいテーブル名::class);<br>
            ※メソッド名は複数形にしましょう。<br><br>
            従テーブル(ArticleCategorySearch)は1対1の時と同じです<br><br>
           取得の仕方もさっきと同じです。1体多なのでhasManyのメソッドを使えば複数取得できます。<br>
        </li>
      </ul>
    </div>',
            'description' => ''
        ]);
    }
}
