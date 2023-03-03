import { apiConnect } from "../api";
import { element_article_list } from "../function";
const URL_API_ARTICLE_LIST = "/api/article-list";

function getArticleList(URL_API_ARTICLE_LIST,createElementFunc){
  apiConnect(URL_API_ARTICLE_LIST, createElementFunc);
}





function createArticleList(data){
  data.map((value) => {
    $('#article_list').append(
      element_article_list(value)
    );
  })
}

getArticleList(URL_API_ARTICLE_LIST, createArticleList);
