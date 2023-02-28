@extends('layouts.layout')

@section('css')
  @vite(['resources/sass/index.scss'])
@endsection

@section('content')
<h1 onclick="test()">yahho~</h1>
@endsection

@section('js')
@vite(['resources/js/test.js'])
@endsection
