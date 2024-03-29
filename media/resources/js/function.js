//カテゴリー親子機能
function categoryParent() {
  console.log('seikoukou');
  $(".child").each(function (i, o) {
    let parent = $(o).attr('name');
    $(o).insertAfter($('#' + parent));
  });
}

//目次作成機能
function makeContents() {
  let subtitle_block = $('#subtitle_block');
  for (let i = 1; i <= $('.subtitle').length; i++) {
    subtitle_block.append(
      $('<li><p class="mokuji_content"><a href="#subtitle' + i + '">' + $("#subtitle" + i).text() + "</a></p></li>")
      );
  }
  console.log('html要素作成完了')
}

//記事リストのHTML要素
function element_article_list(value) {

  const URL_ARTICLE_SINGLE = "/article/single";
  const PARAM_ARTICLE_ID = "?article_id=";

  return(
    `<li class="article_li">
      <a href="${URL_ARTICLE_SINGLE + PARAM_ARTICLE_ID + value.article_id}">
        <div class="block">
          <div class="flex">
            <div>
              <img src="/images/${value.slug}.png" alt="" class="logo">
            </div>
            <div class="logo_color">
              ${value.name}
            </div>
            <div class="block_in_right">
              閲覧数:${value.view_count}
            </div>
          </div>
          <div class="article_title">${value.title}</div>
          <ul>
            <li>${value.description}</li>
          </ul>
        </div>
      </a>
    </li>`
    )
}


export { makeContents, categoryParent,element_article_list}
