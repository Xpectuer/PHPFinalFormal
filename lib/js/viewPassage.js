/*
* generate for index.html
* */

let $_page_title=$("title");
let $_passage_id=GetQueryString("id");

let $passage_title=$("#passage_title");
    let $passage_content=$("#passage_content");
    let $passage_author=$("#passage_author");
    let $passage_time=$("#passage_time");
    let $passage_image=$("#passage_image").find("img");
//加载文章
console.log("viewPassageid:"+$_passage_id);
$.ajax({
    type:"POST",
    url:"services/viewPassage",
    cache:false,
    dataType:"json",
    data:"passage_id="+$_passage_id,
    success:function (datafeedback) {
        console.log(datafeedback);
        $_page_title.html(datafeedback["title"]);
        $passage_title.html(datafeedback["title"]);
        $passage_content.html(datafeedback["content"]);
        $passage_author.html(datafeedback["UserName"]);
        $passage_time.html(datafeedback["time"]);
        $passage_image.attr("src","../lib/uploads/2019/12/"+datafeedback["image"]);
        }
    });






//取得url里的id
function GetQueryString(name)
{
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    //search,查询？后面的参数，并匹配正则
    var r = window.location.search.substr(1).match(reg);
    if(r!=null){
        return  unescape(r[2]);
    }
    return null;
}