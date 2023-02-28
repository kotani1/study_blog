function apiConnect(api_url,createElementFunc) {
  $.ajax({
    url: api_url,
    type: 'GET',	//GET、POST
    dataType: 'json',	//text, html, xml, json, jsonp, script
  }).done(function (data) {
    console.log('seikou')
    console.log(data)
    createElementFunc(data)
  }).fail(function () {
    console.log("失敗: 通信処理NG");
    console.log(api_url)
  })
}
export {apiConnect,}
