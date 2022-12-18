@extends('layouts.layout')

@section('css')
 @vite(['resources/scss/article.scss'])
@endsection




@section('content')

<button onclick="confirm_alert()">テスト</button>
<form action="{{route('admin.article.destroy',$article['id'])}}" method="post"
 onsubmit = "return confirm_alert()" id="delete">
  @csrf
  @method('delete')
  <button type="submit">削除する</button>
</form>

<a href="{{route('admin.article.edit',$article['id'])}}">変更する</a>
<div class="flex">
  <div class="left">
    {{-- 記事ここから --}}
    <h1>{{$article['title']}}</h1>
    <p>記事作成日： {{substr($article['created_at'], 0,10);}}</p>
    <p>補足説明
      <ul>
         {!!$article['description']!!}
      </ul>
    </p>
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
<script>

</script>
@endsection

@section('js')
 @vite(['resources/js/article.js'])
@endsection
