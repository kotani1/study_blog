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
    <h1>管理者機能</h1>
    <ul>
      <li></li>
    </ul>
<div class="block">
      <span class="subtitle" id="subtitle1">概要</span>
      <hr noshade>
       <p>サイトを参考にしながら作りましたが、ほとんどコピペしただけなので挙動についての理解ができませんでした。<br>
        なのでこの記事でわからないところ、気になったところを深堀していけたらいいなと思います。
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle2">config/auth.phpの設定</span>
      <hr noshade>
      <ul>
        <li><p> <span class="common_line">ガード (guard)</span> <br>
          Laravel では「認証」と呼ぶことが多いらしい。
          ログインの種類を表す。 <br>
           例：会員、管理者...
        </p>
        <pre>
          <code>
'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [   // ここ追加
            'driver' => 'session',
            'provider' => 'admin_users', // providerに追加した名前
        ],
    ],
          </code>
        </pre>
      </li>
      <li>
        <p><span class="common_line">ガードドライバ (driver)</span></p>
        <p>ログインの認証状態をどうやって管理するか。多くの場合はセッション認証 (session) です。</p>
        <p>デフォルトの"session"でok</p>
      </li>
        <li><p> <span class="common_line">プロバイダ (provider)</span> <br>
         認証の方法。 <br>
         つまり、誰 （モデル） をどんなロジック （プロバイダドライバ） で、ログインさせるか。
        </p>
        <pre>
          <code>
'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admin_users' => [ // ここ追加
            'driver' => 'eloquent',
            'model' => App\Models\AdminUser::class, //make:modelしたクラス名
        ],
    ],
          </code>
        </pre>
      </li>
       <li>
        <p><span class="common_line">プロバイダドライバ (driver)</span></p>
        <p>ログイン認証の中核となるロジック。 <br>
具体的には、パスワードをどのように検証し、 <br>
 どのような条件ならログインを許可するか、等。 <br>
実体は UserProvider クラスと Hasher クラスの組み合わせです。</p>
        <p>デフォルトの"eloquent"でok</p>
      </li>
      </ul>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle3">&emsp;middlewareについて</span>
      <hr noshade>
      <p>web.php</p>
      <pre>
        <code class="php">
          ->middleware('guest:admin');
        </code>
      </pre>
      <p>guestがmiddlewareの名前, <br>
        adminがmiddlewareの引数
      </p>
      <br>
      <p>app\Http\Kernel.php</p>
      <pre>
        <code>
 'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        </code>
      </pre>
      <br>
      <p>RedirectIfAuthenticated.php</p>
      <pre>
        <code class="php">
  public function handle(Request $request, Closure $next, ...$guards)
  {
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            if ($guard === 'admin') { // 以下3行追記する
                return redirect(RouteServiceProvider::ADMIN_HOME);
            }
            return redirect(RouteServiceProvider::HOME);
            //  public const HOME = '/admin/login';
            // public const ADMIN_HOME = '/admin/dashboard';
      }

    }
    return $next($request);
  }
        </code>
      </pre>
      <p>check()でログインしているかチェックしている。ログインしていたらtrueを返す。</p>
      <p>web.php</p>
      <pre>
        <code class="php">
         'middleware' => 'auth:admin'
        </code>
      </pre>
      <br>
      <p>Authenticate.php</p>
      <pre>
        <code>
    protected function redirectTo($request)
    {
      if (! $request->expectsJson()) {
          return url('/');
      }
    }
        </code>
      </pre>
      <p>元のコードです。 <br>
       どうやらこれだとguardの情報を取得できないそうです。</p>
       <br>
       <pre>
        <code class="php">
    protected function unauthenticated($request, array $guards)
    {
      throw new AuthenticationException(
          'Unauthenticated.',
          $guards,
          $this->redirectToOriginal($request, $guards)
      );
    }

    protected function redirectToOriginal($request, array $guards)
    {
      foreach ($guards as $guard) {
        if ($guard === 'admin') {
            return route('admin.login');
        }
      }
    }
        </code>
       </pre>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle4">&emsp;</span>
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
