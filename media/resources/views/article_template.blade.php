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
     <li>このサイトを作るときに初めてSassを使いました。なので全然知識がないのでちょっと調べてみようかな思いました。</li>
 </ul>
<div class="block"><span class="subtitle"id="subtitle1">&emsp;Sassとは？</span>
      <hr noshade>
      <p>
       「Sass（サス、サース）」とは、CSSを拡張して、書きやすく、見やすくしたスタイルシートのことです。Syntactically Awesome StyleSheetの略で、直訳すると「文法的に素晴らしいスタイルシート」です。従来のCSSにデザイナーやプログラマーが抱いていた不満を解消するスタイルシートといえます。( <a href="https://udemy.benesse.co.jp/design/web-design/sass.html">引用</a> )
      </p>
    </div>

    <div class="block">
      <span class="subtitle" id="subtitle2">&emsp;Sassのメリット</span>
      <hr noshade>
        <ul>
          <li> <p>入れ子の使用が可能 </p></li>
          <li> <p>変数を利用できる </p></li>
          <li> <p>四則演算が可能 </p></li>
          <li> <p>関数を使用できる </p></li>
          <li> <p>ミックスイン・継承による効率化 </p></li>
        </ul>
        <p>プログラミングの特徴と同じですね。</p>
    </div>
    <div class="block">
      <span class="subtitle" id="subtitle3">&emsp;Sassの書き方「SASS」「SCSS」と</span>
      <hr noshade>
      <p>Sassでは二通りの書き方があるみたいで</p>
      <p><span class="common_line">sass記法</span></p>
      <pre>
        <code class="css">
// $変数名: 値
$font-default: Helvetica, sans-serif
$text-color: #111

body
  font-family: $font-default
  color: $text-color
        </code>
      </pre>
      <p><span class="common_line">scss記法</span></p>
      <pre>
        <code class="css">
$font-default: Helvetica, sans-serif;
$text-color: #111;

body {
  font-family: $font-default;
  color: $text-color;
}
        </code>
      </pre>
      <p>このサイトではscss記法で書いています。なので個人的にはscss記法の方が見やすいですね</p>
      </div>

    <div class="block">
      <span class="subtitle" id="subtitle4">&emsp;Mixins</span>
      <hr noshade>
      <p>複数のプロパティ宣言を一緒に再利用できるようにする仕組みです。<br>
      @mixinと宣言してから、半角スペースを空けてmixinの名前を決めます。
      その後に波括弧「{ }」のブロック内にスタイルを定義します。</p>
      <pre>
        <code class="css">
@mixin baseButton($bg-color) {
  border: 1px solid #333;
  background-color: $bg-color;
}

.danger-button {
  <?='@'?>include baseButton(#ff0000);
}
        </code>
      </pre>
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
