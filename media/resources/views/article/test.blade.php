@extends('layouts.layout')

@section('meta')
@endsection

@section('css')
 @vite(['resources/scss/article.scss'])
@endsection




@section('content')
<div class="flex">
  <div class="left">
    <h1>タイトル名</h1>
    <p>記事作成日： </p>
    <p>補足説明：</p>
    <hr noshade>
    <div class="block">
      <span class="subtitle" id="subtitle1">test1</span>
      <hr noshade>
      <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
      <p>aaaaaaaaaaaaaaaaaaaaaaaaa</p>
      <p>aaaaaaaaaaaaaaaaaaaaaaaaa</p>
    </div>
    <div class="block" >
      <span class="subtitle" id="subtitle2">test2</span>
      <hr noshade>
      <p>bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</p>
      <p>bbbbbbbbbbbbbbbbbbbbbbbbbbbbb</p>
      <p>nnnnnnnnnnnnnnnnnnnnnnnnnn</p>
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
     $(this).attr('class', 'gray');
  }).mouseout(function() {

    $(this).attr('class', '');

});
</script>
@endsection
