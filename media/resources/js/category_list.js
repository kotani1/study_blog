import { apiConnect } from "./api";
import { categoryParent } from "./function";

const URL_API_CATEGORY_LIST = '/api/category';
const URL_ARTICLE_BY_CATEGORY ='/article/by-category';
const PARAM = '?category_id=';


function getCategoryList(API_URL,createElementFunc){
  apiConnect(API_URL, createElementFunc)
}

function createCategoryList(data) {
  data.map((value) => {
    if(value.parent_category_name == 'nothing'){
      $('#category_list').append(
        `<li id="${value.name}">
          <a href="${URL_ARTICLE_BY_CATEGORY + PARAM + value.id}">${value.name}</a>
        </li>`
      )
    }else{
      $('#category_list').append(
        `<li class="child" name="${value.parent_category_name}">
            <a href="${URL_ARTICLE_BY_CATEGORY + PARAM + value.id}">${value.name}</a>
        </li>`
      )
    }
  })
  categoryParent();
}

getCategoryList(URL_API_CATEGORY_LIST, createCategoryList);
