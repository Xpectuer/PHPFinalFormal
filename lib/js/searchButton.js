$(".input-group-append").on("click",function () {
  //搜索关键词传入搜索结果页面
    let keywords= $(".form-control-lg").val();
   window.location.href="search.html?keywords="+ keywords;
});