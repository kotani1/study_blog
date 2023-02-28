@extends('layouts.layout')

@section('css')
  @vite(['resources/sass/index.scss'])
@endsection

@section('content')
<div class="flex">
  <div class="left" id="left">
    <ul class="article_ul" id="article_list">
    </ul>
  </div>

  <div class="right">
    <div class="category">
      <h2>カテゴリー</h2>
      <ul id="category_list">
      </ul>
    </div>
    {{-- トップページへ移動 --}}
    <a class="pagetop" href="#"><div class="pagetop__arrow"></div></a>
  </div>
</div>
@endsection

@section('js')
@vite(['resources/js/index.js'])
@vite(['resources/js/article_sort_view.js'])
@vite(['resources/js/category_list.js'])
@endsection
