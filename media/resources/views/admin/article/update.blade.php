@extends('layouts.layout')

@section('meta')
@endsection

@section('css')
@endsection

@section('js')

@endsection

@section('content')
<h1>変更画面</h1>
<div>
  <a href="{{route('admin.article.index')}}">Topへ</a>

  <form action="{{route('admin.article.update',$article['id'])}}" method="post">
    @method('PUT')
    @csrf
    <p><label for="title">タイトル：<input type="text" id="title" name="title" value="{{$article['title']}}"></label></p>
    <p><label for="body">本文:<textarea name="body" id="body" cols="30" rows="10">{{$article['body']}}</textarea></label></p>
    <p><label for="description">説明：<input type="text" id="description" name="description" value="{{$article['description']}}"></label></p>
    <p>recommend_order:<select name="recommend_order">
    <option value="1" selected>1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select></p>
    <button type="submit">変更する</button>
  </form>
</div>
@endsection
