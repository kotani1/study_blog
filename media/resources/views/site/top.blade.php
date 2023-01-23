@extends('layouts.layout')

@section('css')
 @vite(['resources/sass/article.scss'])
@endsection

@section('content')
<div class="flex">
  <div class="left">
    <h1>サイト紹介</h1>
    <span>2022年12月頃に書きました</span>
    
    <div class="block">
      <span class="subtitle" id="subtitle1">このサイトについて</span>
      
      <p>僕が日々勉強してきたことをブログ形式で記録していくサイトです。<br>
        記事の内容は主にweb系の勉強をしてるのでHTML,CSS,JavaScript,PHPなどを書いていくつもりです。現在はLaravelを勉強しているのでLaravelの記事を書きたいなと思います。
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle2">サイトを作った目的</span>
      
      <p>
        MENATAというサービスを使って現役のエンジニアの方Laravelを教えてもらうことになりました。
        そこで何かポートフォリオになるものを作ろうと思いこのサイトをつくりました。<br>
        このサイトを作れば、ポートフォリオにもなるしブログを書くことで復習にもなって一石二鳥だなと思いました。<br>
        あとブログを書くことで、説明力を鍛えれたらいいな思いました。
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle3">記事について</span>
      
      <p>
        ・復習を目的として記事をかいています。ですが完璧に理解できているわけではなく、ある程度理解できたら自分の言葉で記事を書くようにしています。なので記事の内容に間違いがあると思います。
      </p>
    </div>
    <div class="block">
      <span class="subtitle" id="subtitle4">使った言語</span>
      
        <ul>
          <li><p>HTML</p></li>
          <li><p>Sass(CSS)</p></li>
          <li><p>Laravel(PHP)</p></li>
          <li><p>jQuey(JavaScript)</p></li>
        </ul>
        <p>詳しくはこちらの記事をご覧ください<br>
          ↓↓↓↓↓↓↓<br>
          <a href="/making">サイトの作り方</a>
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
