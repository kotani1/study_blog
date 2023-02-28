// // window.apiConnect = function (url,createElement){
// //   $.ajax({
// //     url: url,
// //     type: 'GET',	//GET、POST
// //     dataType: 'json',	//text, html, xml, json, jsonp, script
// //   }).done(function (data) {
// //     createElement(data);
// //   }).fail(function () {
// //     console.log("失敗: 通信処理NG");
// //   })
// // }
// import { apiConnect } from "./api";

// const api_url = "/api/article-list";
// window.getArticleList = function(api_url,createElement){
//   apiConnect(api_url, createElement);
// }

// window.createArticleList = function(data){
//   console.log(data);
//   data.map((value) => {
//     $('#article_list').append(
//       `<li class="article_li">
//       <div class="block">
//       <div class="block_upper_left flex">
//       <img src="/images/${value.article_category.slug}.png" alt="" class="logo">
//       <span class="logo_color">${value.article_category.name}</span>
//       </div>
//       <div class="article_title">${value.article.title}</div>
//       <ul>
//         <li>${value.article.description}</li>
//       </ul>
//     </div>
//     </li>`
//     );
//   })
// }

// getArticleList(api_url,createArticleList);

// function test(){
//   console.log('tets');
// }
// export default test;

// window.location.href = 'article/category_search';



