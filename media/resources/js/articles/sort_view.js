import { apiConnect } from "../api";

const URL_API_ARTICLE_SORT_VIEW = "/api/article-sort-view";

const URL_ARTICLE_SORT_VIEW = "/article/single";
const PARAM = "?article_id=";

function getArticleListSortView(URL_API_ARTICLE_SORT_VIEW,createElementFunc){
  apiConnect(URL_API_ARTICLE_SORT_VIEW, createElementFunc);
}

function createArticleListSortView(data){
  data.map((value) => {
    $('#article_list').append(
    `<li class="article_li">
      <a href="${URL_ARTICLE_SORT_VIEW + PARAM + value.article_id}">
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
    );
  })
}

getArticleListSortView(URL_API_ARTICLE_SORT_VIEW, createArticleListSortView);
