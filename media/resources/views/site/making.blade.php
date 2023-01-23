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
    <h1>サイトの作り方</h1>
    <ul>
      <li>2022年12月頃に書きました</li>
      <li>サイトの作り方を復習もかねて説明します。</li>
    </ul>
    <hr noshade>
    <div class="block">
      <span class="subtitle" id="subtitle1">言語や環境ついて</span>
      <hr noshade>
      <p>
        <span class="common_line">ローカル環境</span><br>
        ・XAMPP <br>
        ・Composer <br>
        ・Node.js(Sassを使うため) <br>
        <span class="common_line">本番環境</span><br>
        ・AWS EC2(webサーバー) <br>
        ・AWS RDS(データベース) <br>
        ・Composer <br>
        ・Node.js <br>
        <span class="common_line">言語</span><br>
        ・HTML、Sass(CSS)、jQuery(JavaScript)、Laravel(PHP)
      </p>

    </div>

    <div class="block">
      <span class="subtitle" id="subtitle2">手順</span>
      <hr noshade>
      <p></p>
        <ol>
          <li>
           <p>データベース</p>
          </li>
          <li>
             <p>管理画面</p>
          </li>
          <li>
             <p>Modelについて
             </p>
          </li>
          <li>
             <p>Controllerについて
             </p>
          </li>
          <li>
             <p>Viewについて
             </p>
          </li>
          <li>
             <p>ルーティングについて
             </p>
          </li>
        </ol>
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle3">データベースについて</span>
      <hr noshade>
      <ul>
        <li><p>このサイトでは3つのテーブルを使いました。<br>
           <span class="common_line">aticlesテーブル </span> <br>
          記事の内容を保存するテーブル <br>
          <img src="/images/site/making1.png" alt=""> <br> <br>
          <span class="common_line">aticle_categoriesテーブル </span><br>
          記事のカテゴリを保存するテーブル<br>
          <img src="/images/site/making2.png" alt=""> <br>
          ・parent_article_idでカテゴリーの親子関係を作っています。<br> <br>
          <span class="common_line">aticle_category_searchesテーブル </span><br>
          記事とカテゴリをリレーションするためのテーブル<br><br>
          <img src="/images/site/making3.png" alt=""> <br>
          <li> <p> article_idでarticleテーブルのidと,article_category_idでaticle_categoriesのidとリレーションしています</p></li>
          </p></li>
      </ul>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle4">管理画面</span>
      <hr noshade>
      <p>
        記事は一人で編集、投稿しているんですが勉強のために管理画面作ってみました。<br>
        こちらのサイトを参考にしました。↓↓↓<br>
        <a href="https://qiita.com/yuu_1st/items/d580fb4cb10b5fcc85d9">https://qiita.com/yuu_1st/items/d580fb4cb10b5fcc85d9</a> <br>
        正直言って挙動についてあんまり理解できませんでした。難しいです。
      </p>
    </div>
    <div class="block">
      <span class="subtitle" id="subtitle5">Modelについて</span>
      <hr noshade>
      <p><span class="common_line">Article.php</span></p>
      <pre>
        <code class="php">
class Article extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at','deleted_at'];

    //リレーション
    public function articleCategorySearch()
    {
        return $this->hasOne(ArticleCategorySearch::class);
    }
}

        </code>
      </pre>
      <p>リレーションについてはこちらの記事をご覧ください。↓↓↓ <br>
        <a href="http://127.0.0.1:8000/admin/article/31">http://127.0.0.1:8000/admin/article/31</a>
       </p> <br>
       <p><span class="common_line">ArticleCategory.php</span></p>
      <pre>
        <code class="php">
class ArticleCategory extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    //リレーション
    public function articleCategorySearches()
    {
        return $this->hasMany(ArticleCategorySearch::class);
    }
}
        </code>
      </pre> <br>

      <p><span class="common_line">ArticleCategorySearch.php</span></p>
      <pre>
        <code class="php">
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
        </code>
      </pre> <br>
    </div>


    <div class="block">
      <span class="subtitle" id="subtitle6">ルーティングについて</span>
      <hr noshade>
      <p>
        <span class="common_line">web.php</span>
      </p>
      <p>・一般ユーザーのルーティング</p>
      <pre>
        <code class="php">
  Route::group(['prefix' => 'article', 'as' => 'article.'],function () {
    Route::get('/', 'App\Http\Controllers\ArticleController@index')->name('index');
    Route::get('/show/{article_id}', 'App\Http\Controllers\ArticleController@show')->name('show');
    Route::get('/article-category-search/{category_slug}','App\Http\Controllers\ArticleController@article_category_search')->name('article-category-search');
    Route::get('sort_new', 'ArticleController@sort_new')->name('sort_new');
    Route::get('sort_view', 'ArticleController@sort_view')->name('sort_view');
    Route::get('/article_category_search/{id}', 'App\Http\Controllers\ArticleResourceController@article_category_search')->name('article_category_search');
});
        </code>
      </pre> <br><br>

      <p>・管理者のルーティング</p>
      <pre>
        <code class="php">
Route::group(['prefix' => 'admin' , 'as'=> 'admin.'], function () {
  Route::get('login', function () {
    return view('admin.admin_login');
  })->middleware('guest:admin');

  Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('dashboard', function () {
      return view('admin.admin_dashboard');
    });
    Route::get('article/sort_new', 'ArticleResourceController@sort_new')->name('article.sort_new');
    Route::get('article/article_category_search/{id}', 'App\Http\Controllers\ArticleResourceController@article_category_search')->name('article.article-category-search');
    Route::resource('article', 'ArticleResourceController');
        </code>
      </pre>
      <p>middlewareでグループ化してる箇所があります。<br>
        管理者としてログインしないとグループ化しているルートにはアクセスできないようになっています。
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle7">Controllerについて</span>
      <hr noshade>
      <ul>
        <li><p>ルーティングでRoute::resourceを使っているので基本的なCRUD処理を書いています。</p></li>
        <li><p> <span class="common_line">最新記事順</span></p>
          <pre>
            <code>
    public function sort_new(Request $request)
    {
        $categories = ArticleCategory::get();
        $articles = ArticleCategorySearch::orderBy('id', 'desc')->get();
        return view('article.index', compact('articles', 'categories'));
    }
            </code>
          </pre>
        </li>
        <li><p> <span class="common_line">閲覧順</span></p>
          <pre>
            <code>
    public function sort_view(Request $request)
    {
        $categories = ArticleCategory::get();
        $articles = ArticleCategorySearch::select()
        ->join('articles', 'article_category_searches.article_id', '=', 'articles.id')
        ->orderBy('articles.view_count', 'desc')
        ->get();
        return view('article.index', compact('articles', 'categories'));
    }
            </code>
          </pre>
        </li>
      </ul>
    </div>
    <div class= "block">
      <span class="subtitle" id="subtitle8">Viewについて</span>
      <hr noshade>
      <img src="/images/site/making4.png" alt=""><br><br>
      <p>写真になりますが、@のが実行されてコード化できませんでした。
      </p>
    </div>

     <div class="block">
      <span class="subtitle" id="subtitle9">作ってみた感想</span>
      <hr noshade>
       <p>
        全体的に見た目のクオリティが低いな思いました。html&cssを毛嫌いした結果が出ました。
        普段よく見るサイトがどれだけ見やすく作られているか思い知らされました。<br>
        laravel以外にも学べたことがあったので作って良かったです。
       </p>
    </div>



  </div>
  <div class="right">
    <div class="mokuji">
      <h2>目次</h2>
      <ul id="subtitle_block"></ul>
    </div>
    <a class="pagetop" href="#"><div class="pagetop__arrow"></div></a>
  </div>
</div>
@endsection

@section('js')
 @vite(['resources/js/article.js'])
@endsection
