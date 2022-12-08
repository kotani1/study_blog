@extends('layouts.layout')

@section('meta')
@endsection

@section('css')
@vite(['resources/scss/app.scss'])
@endsection



@section('content')
<div class="flex">
  <div class="left">
    <a href="{{route('article.create')}}">登録画面へ</a>
    <ul class="article_ul">
      @foreach ($articles as $article)
      <li class="article_li">
        <div class="block">
        <p>titel: {{$article['title']}}</p>
        <a href="{{route('article.show',$article['id'])}}">詳細へ</a>
        </div>
      </li>
    @endforeach
    </ul>
  </div>

  <div class="right block">
    <h3>カテゴリー</h3>
    <ul>
      @foreach ($categories as $category)
        <li>
          <a href="{{route('article.article-category-search',$category['id'])}}">{{$category['name']}}</a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection

@section('js')
@vite(['resources/js/article.js'])
@endsection
