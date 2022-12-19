@extends('layouts.layout')

@section('css')
@endsection

@section('content')
<div class="test">
  <h1>このサイトについて</h1>
    <p class="text_left">
このサイトは名前の通り日々勉強していることをブログにしてあげるためのサイトです。<br>
・作った経緯
laravelの勉強をしようと思いポートフォリオとしてこのサイトを作ろうと思いました。
わからないことや気になることを記録できるしポートフォリオにもなるから一石二鳥だなと思いました。
    </p>
</div>
<style>
  body{
    background-color: rgb(234, 234, 234)
  }
  .test{
    width: 800px;
    margin: auto;
    background-color: white;
  }
</style>
@endsection
