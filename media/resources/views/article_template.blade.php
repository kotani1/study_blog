@extends('layouts.layout')

@section('css')
 @vite(['resources/sass/article.scss'])
@endsection

@section('meta')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/vs.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
@endsection




@section('content')
<div class="flex">
  <div class="left">

    <ul>
      <li>バージョン：9.14.0</li>
    </ul>
<div class="block">
      <span class="subtitle" id="subtitle1">手順</span>
      <hr noshade>
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
      <hr noshade>
      <p>
        二つのテーブルがあった時、そのテーブルどうしで関係性があることです。
     </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle3">&emsp;カラム名のつけ方</span>
      <hr noshade>
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
      <span class="subtitle" id="subtitle4">&emsp;modelの書き方</span>
      <hr noshade>
      <ul>
        <li>
          <p>1対1</p>
          <p> articleテーブルとarticle_category_searchesテーブルは1対1の関係です</p>
          <p> <span class="common_line">Article.php</span> </p>
<pre>
    <code class="laravel">
    public function articleCategorySearch()
    {
        return $this->hasOne(ArticleCategorySearch::class);
    }
  </code>
</pre>
<br>
<p>主テーブル(Article)は<br>
            $this->hasOne(結び付けたいモデル名::class);<br><br></p>
          <p> <span class="common_line">ArticleCategorySearch.php</span> </p>
<pre>
    <code class="laravel">
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
  </code>
</pre>
 <br>
  <p>従テーブル(ArticleCategorySearch)は<br>
            $this->belongsTo(結び付けたいモデル名::class);<br><br></p>
<p>※メソッド名はどちらも単数形にしましょう。<br><br>
            実際にデータを取得してみます。<br></p>
            <p>
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
        <br>
        <li>
          <p>1対多 <br>
            article_categoriesテーブルとarticle_category_searchesテーブルは1対多の関係です。<br>
            <span class="common_line">ArticleCategory.php</span>
          </p>
          <pre>
            <code class="laravel">
    public function articleCategorySearches()
    {
        return $this->hasMany(ArticleCategorySearch::class);
    }
            </code>
          </pre>
          <p>主テーブル(ArticleCategory)は<br>
            $this->hasMany(結び付けたいテーブル名::class);<br></p>
          <br>
          <p>
            <span class="common_line">ArticleCategorySearch.php</span>
          </p>
          <pre>
            <code class="laravel">
    public function articleCategory()
    {
        return $this->belongsTo(Article::class);
    }
            </code>
          </pre>
          <p>
            ※メソッド名は複数形にしましょう。<br><br>
            従テーブル(ArticleCategorySearch)は1対1の時と同じです<br><br>
           取得の仕方もさっきと同じです。1体多なのでhasManyのメソッドを使えば複数取得できます。<br>
        </li>
      </ul>
    </div>

  </div>
  <div class="right">
    <div class="mokuji">
      <h2>目次</h2>
      <div id="subtitle_block"></div>
    </div>
    <a class="pagetop" href="#"><div class="pagetop__arrow"></div></a>
  </div>
</div>
@endsection

@section('js')
 @vite(['resources/js/article.js'])
@endsection
