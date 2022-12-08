@extends('layouts.layout')

@section('meta')
@endsection

@section('css')
@endsection



@section('content')
<h1>詳細画面</h1>
<div>
  <a href="{{route('article')}}">Topへ</a>
  <p>titel: {{$article['title']}}</p>
  <p>body: {{$article['body']}}</p>
  <p>description: {{$article['description']}}</p>
  <p>recommend_order: {{$article['recommend_order']}}</p>
  <a href="{{route('article.edit',$article['id'])}}">変更する</a>
  <form action="{{route('article.destroy',$article['id'])}}" method="post" onsubmit="return check()">
    @method('DELETE')
    @csrf
    <button id="delete">削除する</button>
  </form>
</div>
<script>
  function check(){
    let result = window.confirm('本当に削除しますか？');
    if( result ) {
        return true;
    }
    else {
        return false;
    }
  }
</script>
@endsection
