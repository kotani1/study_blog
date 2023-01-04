<!doctype html>
<html lang="ja" prefix="og: http://ogp.me/ns#">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/sass/common.scss'])
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  @vite(['resources/js/common.js'])
  @yield('meta')
  @yield('css')
  <title>@yield('title')</title>

</head>

<body>
  @include('components.header')
  <div class="content">
   @yield('content')
  </div>
  @include('components.footer')
  @yield('js')
</body>

</html>
