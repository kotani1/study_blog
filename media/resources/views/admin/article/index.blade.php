@extends('layouts.layout')

@section('css')
@vite(['resources/scss/index.scss'])
@endsection

@section('content')
<div class="flex">
  <div class="left">
    <a href="{{route('admin.article.create')}}">登録画面へ</a>
    <ul class="article_ul">
      @foreach ($articles as $article)
        <li class="article_li">
          <a href="{{route('admin.article.show',$article['id'])}}">
            <div class="block">
              <div class="li_category flex">
                <img src="/images/{{$article->articleCategory['name']}}.png" alt="" class="logo">
              {{$article->articleCategory['name']}}
              </div>
              <div class="title">{{$article->article['title']}}</div>
              <div class="description">{{$article->article['description']}}</div>
            </div>
          </a>
        </li>
    @endforeach
    </ul>
  </div>

  <div class="right category">
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
