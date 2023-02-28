import { apiConnect } from "./api";


const ARTICLE_ID = (new URL(document.location)).searchParams.get('article_id');
const API_URL = "/api/article-single/" + ARTICLE_ID;


function getArticleSingle(API_URL,createElementFunc){
  apiConnect(API_URL, createElementFunc)
}

function createArticleSingle(data){
  $('#article').append(
    `<h1 id="article_id">${data.title}</h1>
    <p>記事作成日：${data.created_at.substr(0, 10)}</p>
    補足説明：${data.body}`);
}

getArticleSingle(API_URL, createArticleSingle);
