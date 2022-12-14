@extends('layouts.layout')

@section('css')
  @vite(['resources/sass/index.scss'])
@endsection

@section('content')
<div class="flex">
  <div class="left">
    @isset($articles)
    <ul class="article_ul">
      @foreach ($articles as $article)
        <li class="article_li">
          <a href="{{route('article.show',$article->article['id'])}}">
            <div class="block">
              <div class="block_upper_left flex">
                <img src="/images/{{$article->articleCategory['slug']}}.png" alt="" class="logo">
                <span class="logo_color">{{$article->articleCategory['name']}}</span>
              </div>
              <div class="article_title">{{$article->article['title']}}</div>
              <p>・{{$article->article['description']}}</p>
            </div>
          </a>
        </li>
      @endforeach
    </ul>
    @else
        <h2>記事がありません</h2>
    @endisset
  </div>

  <div class="right">
    <div class="category">
    <h2>カテゴリー</h2>
    <ul>
      @foreach ($categories as $category)
        @if($category['parent_article_category_id']==0)
          <li id="{{$category['id']}}">
            <a href="{{route('article.article-category-search',$category['id'])}}">{{$category['name']}}</a>
          </li>
        @else
        <li class="child" name="{{$category['parent_article_category_id']}}">
            <a href="{{route('article.article-category-search',$category['id'])}}">{{$category['name']}}</a>
          </li>
        @endif
      @endforeach
    </ul>
    </div>
    <a class="pagetop" href="#"><div class="pagetop__arrow"></div></a>
  </div>
</div>
@endsection

@section('js')
@vite(['resources/js/index.js'])
@endsection
