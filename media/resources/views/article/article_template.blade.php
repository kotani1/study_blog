@extends('layouts.layout')

@section('meta')
@endsection

@section('css')
 @vite(['resources/scss/article.scss'])
@endsection




@section('content')
<div class="flex">
  <div class="left">
    <h1>タイトル</h1>
    {{-- <p>記事作成日： {{substr($article['created_at'], 0,10);}}</p> --}}
    {{-- <p>補足説明：laravel1を勉強してみての感想 --}}
    </p>
    <hr noshade>
    <div class="block">
      <span class="subtitle" id="subtitle1">&emsp;サブタイトル</span>
      <hr noshade>
      <p>Laravel は、MVCのWebアプリケーション開発用の無料・オープンソースのPHPで書かれたWebアプリケーションフレームワークである。様々なコミュニティのコンポーネントを使用しており、特にSymfonyは9つのコンポートを利用するなど重要な基盤となっている。(wikipedia引用)</p>
    </div>
    <div class="block">
      <span class="subtitle" id="subtitle2">&emsp;Laravelを勉強しようと思ったきっかけ</span>
      <hr noshade>
      <p>html,css,javascipt,phpを一通り勉強して次何を勉強しようか調べていました。<br>するとフレームワークの概念を知りました。フレームワークについて一通り調べてみてlarvelが初心者におすすめとの意見が見られたので始めてみました。<br>
        おすすめの理由としては<br>
        ・日本語の情報量が多い<br>
        ・世界的に人気な主流フレームワークで将来性がある<br>
        ・コードがわかりやすく学習しやすい<br>
        などです。
      </p>
    </div>
    <div class="block" >
      <span class="subtitle" id="subtitle3">&emsp;Laravelを勉強してみて</span>
      <hr noshade>
      <p>まだ勉強して間もないんですが、とにかく機能が多いなと思いました。<br>
        一つのことを理解しようとしても色々なものと繋がっていてちゃんと理解するのが難しいです。
        <br>
        勉強してよかったことはMVCモデルについての理解ができました。ruby on xrails(Ruby)、
        spring(Java),Cakephp(php)などのwebフレームワークはmvcモデルを採用してるので何か一つ勉強していたら馴染みがありますね。
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
<script>
//subtitle一覧機能
  let subtitle_block =  $('#subtitle_block');
  for(let i=1; i<=$('.subtitle').length; i++){
    subtitle_block.append($('<p class="mokuji_content"><a href="#subtitle'+i+'">・'+$("#subtitle"+i).text()+"</a></p>"));
  }
  $('.mokuji_content').mouseover(function() {
     $(this).attr('class', 'chage_color');
  }).mouseout(function() {
    $(this).attr('class', '');
});
</script>
@endsection
