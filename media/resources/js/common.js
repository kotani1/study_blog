window.confirm_alert = function (word) {
    let result = window.confirm('本当に'+word+'しますか？');
    if (result) {
      return true;
    }
    else {
      return false;
    }
  }
