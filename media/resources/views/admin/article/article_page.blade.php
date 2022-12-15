@extends('layouts.layout')

@section('css')
 @vite(['resources/scss/article.scss'])
@endsection

@section('js')
 @vite(['resources/js/article.js'])
@endsection


@section('content')
{{-- <form action="{{route('admin.article.edit')}}" method="post">
  <button type="submit">変更する</button>
</form> --}}
<form action="{{route('admin.article.destroy',$article['id'])}}" method="post">
  @csrf
  @method('delete')
  <button type="submit">削除する</button>
</form>

<div class="flex">
  <div class="left">
    {{-- 記事ここから --}}
    <h1>{{$article['title']}}</h1>
    <p>記事作成日： {{substr($article['created_at'], 0,10);}}</p>
    <p>補足説明： {{$article['description']}}</p>
    <hr noshade>
    {!!$article['body']!!}
  </div>
  <div class="right">
    <div class="mokuji">
      <h2>目次</h2>
      <div id="subtitle_block"></div>
    </div>
  </div>
</div>
@endsection
