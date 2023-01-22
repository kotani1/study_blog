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

    <h1>VSCodeの便利なショートカット</h1>
      <div class="block">
        <span class="subtitle" id="subtitle1">概要</span>

        <ul>
          <li>
            <p>
              普段はVSCodeを使って開発をしています。ショートカットを使うことで効率的なコーディングができると思います。なので今回で色々調べて使いこなせるようになりたいです。
            </p>
          </li>
        </ul>
      </div>

      <div class="block">
        <span class="subtitle" id="subtitle2">よく使うもの</span>
        <ul>
          <li>
            <p>
              Ctrl+c <br>
              コピー
            </p>
          </li>
          <li>
            <p>
              Ctrl+v <br>
              貼り付け
            </p>
          </li>
          <li>
            <p>
              Ctrl+z <br>
               一度前の処理に戻る
            </p>
          </li>
          <li>
            <p>
              Alt + Shift + ↑ or ↓ <br>
              カーソルの行または選択したものを丸々コピーする。
            </p>
          </li>
        </ul>
      </div>

      <div class="block">
        <span class="subtitle" id="subtitle3">基本操作</span>
        <ul>
          <li>
            <p>
             Ctrl+p <br>
             クイックオープンウィンドウ <br>
             クイックオープンウィンドウは、画面上部に開く入力窓でファイルを開いたり、指定した行にジャンプしたりする事が出来きます。ここで>と入力すると、コマンドパレットのようにVSCodeの機能を検索する事が出来ます。使い方はクイックオープンウィンドウで?を入力すると表示されます。
            </p>
          </li>
          <li><p>Ctrl + b <br>
            サイドバーの開閉
          </p></li>
          <li><p>Ctrl + tab <br>
            タブの移動
          </p></li>
        </ul>
      </div>

      <div class="block">
        <span class="subtitle" id="subtitle4">コーディング</span>

        <ul>
          <li>
            <p>Alt + ↑ or ↓ <br>
              選択行の移動
          </p></li>
          <li>
            <p>タグで囲む <br>
              1:Ctrl + Shift + p でコマンドパレットを開く <br>
              2:wrapと入力 <br>
              3:タグを入力。親要素>子要素.クラス名みたいな感じで。<br>
              例：ul>li*.test、*は全要素
            </p>
          </li>
        </ul>
      </div>

      <div class="block">
        <span class="subtitle" id="subtitle5">文字の置き換え、検索</span>
        <ul>
          <li>
           <p>Ctrl + h <br>
            文字の置き換え
          </p>
          </li>
          <li>
           <p>Ctrl + f <br>
            文字の検索
          </p>
          <p>文字の置き換えや検索は、キー操作を行ってから文字列を入力して実行する方法と先に文字列を選択してから実行する方法があります。文字列を先に選択してから実行すると、入力窓に文字列が表示された状態で実行する事が出来ます。</p>
          </li>
          <li>
            <p>Ctrl + Shift + h <br>
            ワークスペース全体の置き換え
          </p>
          </li>
          <li>
            <p>Ctrl + Shift + f <br>
            ワークスペース全体の検索
          </p>
          </li>
        </ul>
      </div>

      <div class="block">
        <span class="subtitle" id="subtitle6">まとめ</span>
        <ul>
          <li><p>調べたところたくさんありました。なので今のところ使えそうなものをピックアップしました。<br>
            文字の置き換えはすごい役立つだろうなと思いました。
          </p></li>
        </ul>
      </div>


  </div> {{--  leftのdiv  --}}
  <div class="right">
    <div class="mokuji">
      <h2>目次</h2>
      <ul id="subtitle_block"></ul>
    </div>
    <a class="pagetop" href="#"><div class="pagetop__arrow"></div></a>
  </div>
</div>
@endsection

@section('js')
 @vite(['resources/js/article.js'])
@endsection
