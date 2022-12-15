@extends('layouts.layout')

@section('meta')
@endsection

@section('css')
 @vite(['resources/scss/article.scss'])
@endsection
@section('js')
 @vite(['resources/js/article.js'])
@endsection




@section('content')
<div class="flex">
  <div class="left">
      <p>補足説明
        <ul>
          <li>
            laravelのミドルウェアの使い方
          </li>
          <li>
            バージョン：laravel9
          </li>
        </ul>
      </p>
 {{-- 記事ここから --}}
    <div class="block">
      <span class="subtitle" id="subtitle1">&emsp;ミドルウェアとは何か？</span>
      <hr noshade>
      <p>
        HTTPリクエスト（またはレスポンス）をチェックする機能のこと。
        middlewareは自分で関数を定義して作成できる。<br>
        ・Before Middleware：リクエストをチェックする機能 <br>
        ・Afrter Middleware：レスポンスをチェックする機能
        <div class="flex">
          <img src="/images/laravel/middleware1.png" alt="" class="double">
          <img src="/images/laravel/middleware2.png" alt="" class="double">
        </div>

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
    </div>

    <div class="block" >
      <span class="subtitle" id="subtitle3">&emsp;ミドルウェアの作成（条件ファイルの作成）</span>
      <hr noshade>
      <p>
        作成コマンド：php artisan make:middleware ミドルウェア名 <br>
        保存場所はapp/Http/Middleware/ミドルウェア名.php <br>
        ・use Closure; Closureクラスをインポート。<br>
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
          <li>ルート登録</li>
          <li>グループ登録</li>
        </ol>
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle5">&emsp;グローバル登録</span>
      <hr noshade>
      <p>
        すべてのルートにミドルウェアを適用するには、app/Http/Kernel.phpの$middlewareプロパティに追加する。
        <img src="/images/laravel/middleware3.png" alt="" class="single">
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle6">&emsp;ルート登録</span>
      <hr noshade>
      <p>
        各ルートに個別にミドルウェアを適用するには、app/Http/Kernel.phpの$routeMiddlewareプロパティに追加する。 <br>
        <img src="/images/laravel/middleware4.png" alt="" class="single">
      </p>
    </div>

    {{-- 記事ここまで --}}
  </div>
  <div class="right">
    <div class="mokuji">
      <h2>目次</h2>
      <div id="subtitle_block"></div>
    </div>
  </div>
</div>

@endsection

{{-- <div class="block">
      <span class="subtitle" id="subtitle1">&emsp;認証機能について</span>
      <hr noshade>
      <p><a href="https://qiita.com/yuu_1st/items/d580fb4cb10b5fcc85d9">こちらのサイト</a>を参考にlaravelにある認証機能を使い管理ページを作りました。</p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle2">&emsp;作業の流れ</span>
      <hr noshade>
      <p>
        <ol>
          <li>マイグレーションファイルを作成する</li>
          <li>modelを作成する</li>
          <li>providerを作成する</li>
          <li>コントローラーを作成する</li>
          <li>blade.phpを作成する</li>
          <li>web.phpを作成する</li>
          <li>テストアカウントを作成する</li>
          <li>ログイン済みのリダイレクト</li>
          <li>ログアウト処理の追加</li>
          <li>ダッシュボードの作成</li>
          <li>アカウント登録画面の作成</li>
        </ol>
      </p>
    </div>

    <div class="block" >
      <span class="subtitle" id="subtitle3">&emsp;providerの追加とは？</span>
      <hr noshade>
      <p>
        config/auth.phpにある。<br>
      </p>
    </div> --}}
