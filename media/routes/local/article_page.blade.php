@extends('layouts.layout')

@section('css')
 @vite(['resources/sass/article.scss'])
@endsection




@section('content')

<div class="flex">
  <div class="left">
    {{-- 記事ここから --}}
    <h1>{{$article['title']}}</h1>
    <p>記事作成日： {{substr($article['created_at'], 0,10);}}</p>
    <p>補足説明
      <ul>
         {!!$article['description']!!}
      </ul>
    </p>
    <hr noshade>
    {!!$article['body']!!}
    <div class="comment">
      <h3>コメント</h3>
      <textarea name="" id="" cols="30" rows="10" placeholder="コメントを入力"></textarea>
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
