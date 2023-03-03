import { apiConnect } from "../api";
import { element_article_list } from "../function";

const URL_API_ARTICLE_SORT_NEW = "/api/article-sort-new";


function getArticleListSortNew(URL_API_ARTICLE_SORT_NEW,createElementFunc){
  apiConnect(URL_API_ARTICLE_SORT_NEW, createElementFunc);
}

function createArticleListSortNew(data){
  data.map((value) => {
    $('#article_list').append(
      element_article_list(value)
    );
  })
}

getArticleListSortNew(URL_API_ARTICLE_SORT_NEW, createArticleListSortNew);
