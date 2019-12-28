//ajax导入数据源
let dataArr;
let currPage = 1;
let totalCount;
let outPutObj=$("#passage_list");
let html;
let pageNum;
let keywords;
window.onload = function() {
    /*取到总条数*/
    /*每页显示  5条*/


    //取得keyword
    keywords=GetQueryString("keywords");
    //------
    let limit = 5;
    data(keywords);
    pageNum=Math.ceil(totalCount/limit);
    //console.log(totalCount)
    createList(limit, totalCount,dataArr);

    display(1,limit);
    $("#left_button").on("mouseover",function () {
        $(this).attr("class","page-item active");
    });
    $("#left_button").on("mouseout",function () {
        $(this).attr("class","page-item");
    });
    $("#left_button").on("click",function () {
        currPage--;
        if(currPage>0){
            display(currPage,limit);
        }else{
            currPage++;
            alert("已经是最前咯～");

        }

    });


    $("#right_button").on("mouseover",function () {
        $(this).attr("class","page-item active");
    });
    $("#right_button").on("mouseout",function () {
        $(this).attr("class","page-item");
    });
    $("#right_button").on("click",function () {
        currPage++;
        if(currPage<=pageNum){
            display(currPage,limit);
        }else{
            alert("已经是最后咯～");
            currPage--;
        }
    });





    //@call plugin method
    // $('#CallBackPager').extendPagination({
    //     totalCount: totalCount,
    //     limit: limit,
    //     callback: function(curr, limit, totalCount) {
    //         data(curr, limit)
    //     }
    // });

    // $('#callback-pager').pagination({
    //     dataSource:dataArr,
    //     pageSize:limit,
    //     callback:function (data,pagination) {
    //
    //     }
    //
    //
    // })
};
//取数据
function data(keywords) {

    $.ajax(
        {
            type: "GET",
            url: "services/viewPassageList.php",
            data: "mode=SEARCH&keywords="+keywords,
            dataType: "json",
            async:false,
            success: function (datafeedback) {
                console.log(datafeedback);
                dataArr = datafeedback;
                totalCount=datafeedback.length;
                console.log(dataArr);
                console.log(totalCount);
            }
        }
    );

}
function createList(limit,total,dataArr) {
    html=[];

    //initialize html[]+++++++++++++
    for(let i=0;i<pageNum;i++){
        html[i]=[];
        for(let j=0;j<limit;j++){
            html[i][j]=null;
        }
    }
    //++++++++initialize showNum++++++++++++

    let showNum;
    //+++++++++++++++++++
    if(dataArr.length!==0){
    for(let i=0;i<pageNum;i++){
        showNum=limit;
        if(total - (currPage * limit) < 0)
            showNum = total - ((currPage - 1) * limit);
        for(let j=0;j<showNum;j++){
            let n=i*limit+j;

            html[i][j]="  <div class=\"card card-horizontal\">\n" +
                "                    <div class=\"card-body\">\n" +
                "                        <div class=\"card-horizontal-left\">\n" +
                "                            <div class=\"card-category\">\n" +
                "                                <a href=\"category.html\">Lifestyle</a>\n" +
                "                            </div>\n" +
                "                            <h3 class=\"card-title\">\n" +
                "                                <a href=\"hollowKnight.html?id="+dataArr[n].id+"\">"+dataArr[n].title+"</a>\n" +
                "                            </h3>\n" +
                "                            <div class=\"card-excerpt\">\n" +
                "                                <p>"+dataArr[n].content+"</p>\n" +
                "                            </div>\n" +
                "                            <div class=\"card-horizontal-meta\">\n" +
                "                                <div class=\"eskimo-author-meta\">\n" +
                "                                    By <a class=\"author-meta\" href=\"hollowKnight.html?id="+dataArr[n].id+"\">"+dataArr[n].UserName+"</a>\n" +
                "                                </div>\n" +
                "                                <div class=\"eskimo-date-meta\">\n" +
                "                                    <a href=\"hollowKnight.html?id="+dataArr[n].id+"\">"+dataArr[n].time+"</a>\n" +
                "                                </div>\n" +
                "                                <div class=\"eskimo-reading-meta\">2 min read</div>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                        <div class=\"card-horizontal-right\" \">\n" +
                "                            <a class=\"card-featured-img\" href=\"single-post.html\"><img src=\"../lib/uploads/2019/12/"+dataArr[n].image+"\"></a>" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                </div>";
            // console.log(html);
        }
    }
    }


    // outPutObj.empty();

    //添加到列表
    // for(let i=0;i<limit;i++)
    // outPutObj.append(html[i]);
}

function display(currpage,limit){
    outPutObj.empty();
    if(dataArr.length!==0) {
        // console.log(html[0][0]);
        //添加到列表
        for (let i = 0; i < limit; i++)
            outPutObj.append(html[currpage - 1][i]);
    }
    else{
        outPutObj.append("<h1>👴の❤🍐🈳荡荡</h1>");
    }
}



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

