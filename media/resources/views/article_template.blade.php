@extends('layouts.layout')

@section('meta')
@endsection

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
    <h1>タイトル</h1>
    <ul>
     <li>laravelのミドルウェアの使い方</li>
     <li>バージョン：laravel9</li>
     <li>管理画面機能で使っているmiddlewareを解説していきます。</li>
    </ul>
    {{-- <p>記事作成日： {{substr($article['created_at'], 0,10);}}</p> --}}
    <div class="block"><span class="subtitle"id="subtitle1">&emsp;ミドルウェアとは？</span>
      <hr noshade>
      <p>
        Contorollerで処理する前にワンクッション挟んで処理を実行するやつ。 <br>
        調べてみると・・・ <br>
        ・HTTPリクエストが送られたタイミングで実行される処理を定義できる機能 <br>
        ・コントローラ実行前(実行後)に処理を挟める <br>
        ・認証機能などに使われている <br>
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle2">&emsp;Middlewareを実際に使うまでの流れ</span>
      <hr noshade>
      <p>
        <ol>
          <li>ミドルウェアの作成（条件ファイルの作成）</li>
          <li>ミドルウェアの登録</li>
          <li>ミドルウェアをルートに適用</li>
        </ol>
      </p>
      <p>
        今回は管理者機能で使っているmiddlewareをメインに説明します。
      </p>
    </div>
    <div class="block">
      <span class="subtitle" id="subtitle3">&emsp;管理者機能のmiddleware</span>
      <hr noshade>
      <pre>
        <code class="php">
          ->middleware('guest:admin')</code>
      </pre>
      <pre>
        <code class="php">
          'middleware' => 'auth:admin'</code>
      </pre>
      <p>
        二つのmiddlewareを使っています。 <br>
        'auth','guest'がmiddlewareの名前、adminが引数です。
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle4">&emsp;ミドルウェアの登録</span>
      <hr noshade>
      <p>
        ミドルウェアをルートに登録する方法は３つある。<br>
        いずれもApp\Http\Kernelクラスの中に記述する。（デフォルトでミドルウェアが登録されている。）
        <ol>
          <li>グローバル登録</li>
          <p>app/Http/Kernel.phpの$middlewareプロパティに追加する。</p>
          <li>ルート登録</li>
          <p>各ルートに個別にミドルウェアを適用するには、app/Http/Kernel.phpの$routeMiddlewareプロパティに追加する。</p>
          <li>グループ登録</li>
          <p>app/Http/Kernel.phpの$middlewareGroupsプロパティに追加する。</p>
        </ol>
       </p>
        <p>
          管理者機能は$routeMiddlewareの'auth','guest'だからルート登録されてますね。
        </p>
    </div>
    

  </div>
  <div class="right">
    <div class="mokuji">
      <h2>目次</h2>
      <div id="subtitle_block"></div>
    </div>
  </div>
</div>
@endsection

@section('js')
 @vite(['resources/js/article.js'])
@endsection
