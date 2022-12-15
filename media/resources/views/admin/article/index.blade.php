@extends('layouts.layout')

@section('css')
@vite(['resources/scss/index.scss'])
@endsection

@section('content')
<div class="flex">
  <div class="left">
    <a href="{{route('admin.article.create')}}">登録画面へ</a>
    @isset($articles)
    <ul class="article_ul">
      @foreach ($articles as $article)
        <li class="article_li">
          <a href="{{route('admin.article.show',$article->article['id'])}}">
            <div class="block">
              <div class="li_category flex">
                <img src="/images/{{$article->articleCategory['name']}}.png" alt="" class="logo">
              {{$article->articleCategory['name']}}
              </div>
              <div class="title">{{$article->article['title']}}</div>
              <div class="description">
                <ul>
                  {!!$article->article['description']!!}
                </ul>
              </div>
            </div>
          </a>
        </li>
    @endforeach
    </ul>
    @else
        <h2>記事がありません</h2>
    @endisset
  </div>

  <div class="right category">
    <h3>カテゴリー</h3>
    <ul>
      @foreach ($categories as $category)
        <li>
          <a href="{{route('admin.article.article-category-search',$category['id'])}}">{{$category['name']}}</a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection

@section('js')
@vite(['resources/js/article.js'])
@endsection
