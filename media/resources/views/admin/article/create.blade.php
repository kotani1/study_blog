@extends('layouts.layout')

@section('meta')
@endsection

@section('css')
@vite(['resources/scss/app.scss'])
@endsection

@section('js')

@endsection

@section('content')
<h1>登録画面</h1>
<div>
  <a href="{{route('article.index')}}">Topへ</a>
  <form action="{{route('article.store')}}" method="post">
    @csrf
    <div class="flex">
      <div class="db_table"><h3>articleテーブル</h3>
        <p>
          <label for="article_title">タイトル：<input type="text" id="article_title" name="article_title"></label>
        </p>
        <p>
          <label for="article_body">本文:<textarea name="article_body" id="article_body" cols="30" rows="10"></textarea></label>
        </p>
        <p>
          <label for="article_description">説明：<input type="text" id="article_description" name="article_description"></label>
        </p>
        <p>recommend_order:
          <select name="article_recommend_order">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            </select>
        </p>
      </div>
      <div class="db_table"><h3>article_category_searchesテーブル</h3>

          カテゴリー：
          <select name="category_id">
            @foreach ($article_categories as $article_category)
              <option value="{{$article_category['id']}}">{{$article_category['name']}}</option>
            @endforeach
          </select>
        </p>
      </div>
      <div class="db_table">
        <button type="submit">登録</button>
      </div>
    </div>

  </form>
  <style>
    select{
      font-size:30px;
    }
  </style>
</div>
@endsection
