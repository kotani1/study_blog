@extends('layouts.layout')

@section('css')
 @vite(['resources/sass/article.scss'])
@endsection

@section('meta')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/vs.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
@endsection




@section('content')
<div class="flex">
  <div class="left">
    <div id="article">
    </div>

  </div>
  <div class="right">
    <div class="mokuji">
      <h2>目次</h2>
      <ul id="subtitle_block">

      </ul>
    </div>
    <a class="pagetop" href="#"><div class="pagetop__arrow"></div></a>
  </div>
</div>
@endsection

@section('js')
 @vite(['resources/js/articles/single.js'])
@endsection
