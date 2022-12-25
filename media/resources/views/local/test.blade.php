@extends('layouts.layout')

@section('meta')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/vs.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
@endsection

@section('css')
 @vite(['resources/sass/article.scss'])
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
            Laravelのバージョン：9.41.0
          </li>
        </ul>
      </p>
 {{-- 記事ここから --}}
    <div class="block">
      <span class="subtitle" id="subtitle1">&emsp;手順</span>
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
      <span class="subtitle" id="subtitle2">&emsp;リレーションシップとは？</span>
      <hr noshade>
      <p>
        二つのテーブルがあった時、そのテーブルどうしで関係性があることです。
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
