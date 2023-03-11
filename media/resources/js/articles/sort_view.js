import { apiConnect } from "../api";
import { element_article_list } from "../function";


const URL_API_ARTICLE_SORT_VIEW = "/api/article-sort-view";


function getArticleListSortView(URL_API_ARTICLE_SORT_VIEW,createElementFunc){
  apiConnect(URL_API_ARTICLE_SORT_VIEW, createElementFunc);
}

function createArticleListSortView(data){
  data.map((value) => {
    $('#article_list').append(
      element_article_list(value)
    );
  })
}

getArticleListSortView(URL_API_ARTICLE_SORT_VIEW, createArticleListSortView);
