window.confirm_alert = function () {
    let result = window.confirm('本当に削除しますか？');
    if (result) {
      return true;
    }
    else {
      return false;
    }
  }
