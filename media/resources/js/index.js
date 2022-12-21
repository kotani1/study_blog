//Cカテゴリー親子機能
$(".child").each(function (i, o) {
  let parent = $(o).attr('name');
  $(o).insertAfter($('#'+parent));
});
