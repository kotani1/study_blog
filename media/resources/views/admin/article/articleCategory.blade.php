@extends('layouts.layout')

@section('meta')
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')
<a href="{{route('article.index')}}">戻る</a>
    @isset($article_categories)
        @foreach ($article_categories as $article_category)
            <div class="article">
                <h1>{{$article_category->article['title']}}</h1>
                <p>{{$article_category->article['body']}}</p>
            </div>
        @endforeach
    @else
        <h2>記事がありません</h2>
    @endisset
@endsection
