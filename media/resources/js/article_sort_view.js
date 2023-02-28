import { apiConnect } from "./api";

const API_URL = "/api/article-sort-view";

function getArticleListSortView(API_URL,createElementFunc){
  apiConnect(API_URL, createElementFunc);
}

function createArticleListSortView(data){
  data.map((value) => {
    $('#article_list').append(
    `<li class="article_li">
      <a href="article/single?article_id=${value.article_id}">
        <div class="block">
          <div class="block_upper_left flex">
            <img src="/images/${value.slug}.png" alt="" class="logo">
              <span class="logo_color">${value.name}</span>
          </div>
          <div class="article_title">${value.title}</div>
          <ul>
            <li>${value.description}</li>
          </ul>
        </div>
      </a>
    </li>`
    );
  })
}

getArticleListSortView(API_URL, createArticleListSortView);
