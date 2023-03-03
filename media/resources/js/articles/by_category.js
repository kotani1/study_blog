import { apiConnect } from "../api";
import { element_article_list } from "../function";


//パラメータ取得
const CATEGORY_ID = (new URL(document.location)).searchParams.get('category_id');

const URL_API_ARTICLE_BY_CATEGORY = "/api/article-by-category/" + CATEGORY_ID;




window.getArticleByCategory = function (URL_API_ARTICLE_BY_CATEGORY, createElementFunc) {
  apiConnect(URL_API_ARTICLE_BY_CATEGORY, createElementFunc);
}


window.createArticleListByCategory = function (data) {
  if (data.length === 0) {
    $('#article_list').html(
      `<h1>記事がありません</h1>`
    )
  } else {
    $('#article_list').html('');
    data.map((value) => {
      $('#article_list').append(
        element_article_list(value)
      )
    })
  }
}

getArticleByCategory(URL_API_ARTICLE_BY_CATEGORY, createArticleListByCategory);

// export {getArticleByCategory,createArticleByCategory}
