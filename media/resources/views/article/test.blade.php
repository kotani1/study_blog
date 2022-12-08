@extends('layouts.layout')

@section('meta')
@endsection

@section('css')
@endsection



@section('content')
<div class="flex">
  <div class="left">
    <h1>タイトル名</h1>
    <hr noshade>
    <span class="subtitle">test1</span>
    <p>aaaaaaaaaaaaaaaaaaaaaaaaa</p>
    <p>aaaaaaaaaaaaaaaaaaaaaaaaa</p>
    <p>aaaaaaaaaaaaaaaaaaaaaaaaa</p>

  </div>
  <div class="right">
    <div class="subtitle_block">
      
    </div>
  </div>
</div>


<style>
  .flex{
    display: flex;
  }
  .subtitle{
    font-size: 30px
  }
  .left{
    width: 65%;
    border: solid 1px ;
  }
  .right{
    width: 35%;
  }
</style>
@endsection
