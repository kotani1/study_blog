import { apiConnect } from "./api";
// import { getArticleByCategory, createArticleByCategory } from "./article_category_search";


const WEB_URL ='/article/category-search';
const PARAM = '?category_id=';

$.ajax({
  url: "/api/category",
  type: 'GET',	//GET、POST
  dataType: 'json',	//text, html, xml, json, jsonp, script
}).done(function (data) {
  console.log("通信成功");
  console.log(data);
  data.map((value) => {
    $('#category_list').append(
      `<li><a href="${WEB_URL + PARAM + value.id}">${value.name}</a></li>`
    );
  })
}).fail(function () {
  console.log("失敗: 通信処理NG");
})
