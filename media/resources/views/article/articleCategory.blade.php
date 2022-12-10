@extends('layouts.layout')

@section('meta')
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')

    @isset($articles_category)
    <a href="{{route('article')}}">戻る</a>
        <form action="{{route('article.article-category-search.newest',$category_id)}}" method="POST">
            @csrf
            <input type="hidden" name="category_id" value="{{$category_id}}">
            <button type="submit">最新順</button>
        </form>
    <p>記事数：{{count($articles_category)}}</p>
        @foreach ($articles_category as $article_category)
            <div class="article">
                <h1>{{$article_category->article['title']}}</h1>
                <p>{{$article_category->article['body']}}</p>
            </div>
        @endforeach
    @else
        <h2>記事がありません</h2>
    @endisset
@endsection
