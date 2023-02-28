import { apiConnect } from "./api";


const CATEGORY_ID = (new URL(document.location)).searchParams.get('category_id');
const API_URL = "/api/article-category-search/" + CATEGORY_ID;
const PARAM = "?article_id=";


window.getArticleByCategory = function (API_URL,createElementFunc){
  apiConnect(API_URL,createElementFunc);
}


window.createArticleByCategory = function (data){
  if (data.length === 0) {
    $('#article_list').html(
      `<h1>記事がありません</h1>`
    )
  } else {
    $('#article_list').html('');
    data.map((value) => {
      const article_single_url = '/article/single';
      $('#article_list').append(
        `<li class="article_li">
    <a href="${article_single_url + PARAM + value.article.id}">
    <div class="block">
    <div class="block_upper_left flex">
    <img src="/images/${value.article_category.slug}.png" alt="" class="logo">
    <span class="logo_color">${value.article_category.name}</span>
    </div>
    <div class="article_title">${value.article.title}</div>
    <ul>
      <li>${value.article.description}</li>
    </ul>
  </div>
    </a>
  </li>`
      )
    })
  }
}

getArticleByCategory(API_URL,createArticleByCategory);

// export {getArticleByCategory,createArticleByCategory}
