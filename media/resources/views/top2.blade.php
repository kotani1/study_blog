@extends('layouts.layout')

@section('css')
@endsection

@section('content')
<div class="test">
  <h1>使用した技術</h1>
  <h2>言語</h2>
    <ul>
      <li>laravel(php)</li>
      <li>jquery(javascipt)</li>
      <li>html&css</li>
      <li>scss</li>
    </ul>
  <h2>説明</h2>
  <p><strong>laravel(php)</strong><br>
    phpのフレームワーク。バージョンは9.41.0
  </p>

</div>
<style>
  body{
    background-color: rgb(234, 234, 234)
  }
  .test{
    text-align: center;
    width: 800px;
    margin: auto;
    background-color: white;
  }
  .text_left{
    text-align: left
  }
</style>
@endsection
