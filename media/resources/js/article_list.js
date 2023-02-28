import { apiConnect } from "./api";

const API_URL = "/api/article-list";

function getArticleList(API_URL,createElementFunc){
  apiConnect(API_URL, createElementFunc);
}

function createArticleList(data){
  data.map((value) => {
    $('#article_list').append(
    `<li class="article_li">
      <a href="article/single?article_id=${value.id}">
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
    );
  })
}

getArticleList(API_URL,createArticleList);
