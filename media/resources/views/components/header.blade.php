<header>
  <div class="moji center">勉強ブログ</div>
  <ul class="menu">
    <li class="menu__single">
        <a href="#" class="init-bottom">このサイトについて</a>
        <ul class="menu__second-level">
            <li><a href="/">サイト紹介</a></li>
            <li><a href="/making">作り方</a></li>
            {{-- <li><a href="/contact">お問い合わせ </a></li> --}}
        </ul>
    </li>
    <li class="menu__single">
        <a href="#" class="init-bottom">記事</a>
        <ul class="menu__second-level">
            <li><a href="{{route('article.index')}}">一覧</a></li>
            <li><a href="{{route('article.sort_new')}}">最新記事順 </a></li>
            <li><a href="{{route('article.sort_view')}}">閲覧順 </a></li>
        </ul>
    </li>
  </ul>
</header>
