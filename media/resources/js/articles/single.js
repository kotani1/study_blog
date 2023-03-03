import { apiConnect } from "../api";
import { makeContents } from "../function";


const ARTICLE_ID = (new URL(document.location)).searchParams.get('article_id');
const URL_API_ARTICLE_SINGLE = "/api/article-single/" + ARTICLE_ID;




function getArticleSingle(URL_API_ARTICLE_SINGLE,createElementFunc){
  apiConnect(URL_API_ARTICLE_SINGLE, createElementFunc)
}

function createArticleSingle(data){
  $('#article').append(
    `<h1 id="article_id">${data.title}</h1>
    <p>記事作成日：${data.created_at.substr(0, 10)}</p>
    補足説明：${data.body}`
    );

    //目次作成機能
    makeContents();
}

getArticleSingle(URL_API_ARTICLE_SINGLE, createArticleSingle);
