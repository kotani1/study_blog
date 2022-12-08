<!doctype html>
<html lang="ja" prefix="og: http://ogp.me/ns#">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="style.css">
  {{-- @vite(['resources/scss/common.scss']) --}}
  @yield('meta')
  @yield('css')
  <title>@yield('title')</title>

</head>

<body>
  @include('components.header')
  @yield('content')
  @include('components.footer')
  @yield('js')
</body>

</html>
