import './bootstrap';

function confirm_alert() {
  let result = window.confirm('本当に削除しますか？');
  if (result) {
    return true;
  }
  else {
    return false;
  }
}

// { { -- < form action = "{{route('article.destroy',$article['id'])}}" method = "post" onsubmit = "return check()" >
