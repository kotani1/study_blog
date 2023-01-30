@extends('layouts.layout')

@section('css')
 @vite(['resources/sass/article.scss'])
@endsection

@section('meta')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/vs.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
@endsection


 {{-- <div class="block">
        <span class="subtitle" id="subtitle1"></span>
        <ul>
          <li><p></p></li>
        </ul>
      </div> --}}



@section('content')
<div class="flex">
  <div class="left">

    <h1>記事の最終更新日が勝手に更新される</h1>
    <ul>
      <li>バージョン:9.41.0</li>
    </ul>
      <div class="block">
        <span class="subtitle" id="subtitle1">概要</span>
        <ul>
          <li>
            <p>
              このサイトの記事の最終更新日が勝手に更新されていました。 <br>
              そもそも最終更新日を書いている理由は記事の情報を時間の面で判断するために書いています。作成日が古いけど、最終更新日が最近だったらまだ信用性があるなみたいな感じです。
            </p>
          </li>
        </ul>
      </div>

      <div class="block">
        <span class="subtitle" id="subtitle2">解決方法</span>
        <ul>
          <li>
           <p>調べたところ色々ありました。 <br>
          appからコントローラー名のパスを記述するやり方や <br>
          useを使うやり方などがありました。
         </p>
          </li>
          <li>
            <p>今回はapp\Providers\RouteServiceProvider.phpを書き換えるやり方にします。</p>
          </li>
          <li>
            <p>ちなみにLaravel7まではコントローラー名だけでもエラーは出ないそうです。</p>
          </li>
        </ul>
      </div>

      <div class="block">
        <span class="subtitle" id="subtitle3">app\Providers\RouteServiceProvider.php</span>
            <p>
              <pre>
                <code>
   protected $namespace = 'App\Http\Controllers'; //追加
    public function boot()
    {
      $this->configureRateLimiting();

      $this->routes(function () {
          Route::middleware('api')
              ->prefix('api')
              ->namespace($this->namespace) //追加
              ->group(base_path('routes/api.php'));

          Route::middleware('web')
              ->namespace($this->namespace) //追加
              ->group(base_path('routes/web.php'));
      });
    }
                </code>
              </pre>
            </p>
            <ul>
              <li>
                <p>$namespaceでAppからコントロールのパスを記述し、$namespaceを通ってからweb.phpに行く感じですね。</p>
              </li>
            </ul>
      </div>




  </div> {{--  leftのdiv  --}}
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
