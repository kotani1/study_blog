@extends('layouts.layout')

@section('css')
 @vite(['resources/sass/article.scss'])
@endsection

@section('content')
<div class="flex">
  <div class="left">
    <h1>サイトの作り方</h1>
    <span>2022年12月頃に書きました</span>
    <hr noshade>
    <div class="block">
      <span class="subtitle" id="subtitle1">&emsp;言語や環境ついて</span>
      <hr noshade>
      <ul>
        <li><p></p></li>
      </ul>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle2">&emsp;手順</span>
      <hr noshade>
      <p>大まかな順序を説明します。
        環境は構築しているものとします。<br>
        <ol>
          <li>
           <p>データベース設計について<br>
            aticlesテーブル
            記事の内容を保存するテーブル
            aticle_categoriesテーブル
            記事のカテゴリを保存するテーブル
            aticle_category_searchesテーブル
            記事とカテゴリをリレーションするためのテーブル
            article_idでarticleテーブルのidと,article_category_idでaticle_categoriesのidとリレーションしています。
          </p>

          </li>
        </ol>

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
