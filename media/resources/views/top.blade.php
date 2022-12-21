@extends('layouts.layout')

@section('css')
 @vite(['resources/sass/article.scss'])
@endsection

@section('content')
<div class="flex">
  <div class="left">
    <h1>サイト紹介</h1>
    <span>2022年12月頃に書きました</span>
    <hr noshade>
    <div class="block">
      <span class="subtitle" id="subtitle1">&emsp;このサイトについて</span>
      <hr noshade>
      <p>僕が日々勉強してきたことをブログ形式で記録していくサイトです。<br>
        記事の内容は主にweb系の勉強をしてるのでhtml,css,javscript,php,sql等々です。現在はlaravelを勉強しているのでlaravelの記事が多いと思います。
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle2">&emsp;サイトを作った目的</span>
      <hr noshade>
      <p>
        laravelの勉強をしていました。何かポートフォリオになるものを作ろうと思いこのサイトをつくりました。<br>
        このサイトを作れば、ポートフォリオにもなるしブログを書くことで復習にもなって一石二鳥だなと思いました。<br>
        あとブログを書くことで、説明力を鍛えれたらいいな思いました。
      </p>
    </div>
    <div class="block">
      <span class="subtitle" id="subtitle3">&emsp;使った言語</span>
      <hr noshade>
        <ul>
          <li><p>html</p></li>
          <li><p>scss(css)</p></li>
          <li><p>laravel(php)</p></li>
          <li><p>jquey(javascript)</p></li>
        </ul>
        <p>詳しくはこちらの記事をご覧ください<br>
          ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
          
        </p>
    </div>
    <div class="block">
      <span class="subtitle" id="subtitle4">&emsp;作ってみた感想</span>
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
      <div id="subtitle_block"></div>
    </div>
  </div>
</div>
@endsection

@section('js')
 @vite(['resources/js/article.js'])
@endsection
