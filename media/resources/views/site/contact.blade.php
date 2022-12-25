@extends('layouts.layout')

@section('css')
 @vite(['resources/sass/article.scss'])
@endsection

@section('content')
<div class="content">
  <h1>お問い合わせ</h1>
  <div class="flex">
    <div>
      <p>名前</p>
      <hr>
      <p>メールアドレス</p>
      <p>内容</p>
    </div>
    <div class="left1">
      <form action="/mail_test" method="POST">
        @csrf
        <p><input type="text" name="name"></p>
        <hr>
        <p><input type="text" name="email"></p>
        <p><textarea name="content" cols="30" rows="10"></textarea></p>
        <button type="submit">送信する</button>
      </form>
    </div>
  </div>
</div>
<style>
  .content{
    margin: auto;
    width: 900px;
  }
  h1{
    text-align: center;
  }
  .left1{
    padding-left: 30px;
  }
</style>
@endsection
