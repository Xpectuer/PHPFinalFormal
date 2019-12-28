let userName;
let comId;
let reId;
let imaId;
let mesId;
let image;
let time;
let authorId;
let passageId=GetQueryString("id");//写函数从GET中获得

console.log("commentId:"+passageId);

//定义选择器

let comList=$("#commentlist");
//回复展开
let selector1=".eskimo_comment_wrapper> .eskimo_comments> .eskimo_comment> .eskimo_comment_inner> .eskimo_comment_right> .eskimo_comment_right_inner> .eskimo_comment_links> #reply-btn";
//回复提交按钮
let selector2=".eskimo_comment_wrapper> #reply-wrapper> #reply-submit" ;







//加载评论  passage id
$.ajax({
    type:"POST",
    url:"services/view.php",
    dataType:"json",
    data:"id="+passageId,
    success:function (dataFeedBack) {
        $.each(dataFeedBack,function (index,obj) {


            //从后台请求数据
            comId=obj["id"];
            userName=obj["UserName"];
            imaId=obj["profile_image"];
            comment=obj["content"];
            authorId=obj["authorId"];
            mesId=obj["id"];
            time=obj["created_time"];//评论时间
            image="<img alt='' src='../lib/uploads/2019/12/img"+imaId+".jpg' />";
            let commit=" <div class=\"eskimo_comment_wrapper\" id=\'comment_"+mesId+"\'>\n" +
                "                                <div class=\"eskimo_comments\">\n" +
                "                                    <div class=\"eskimo_comment\">\n" +
                "                                        <div class=\"eskimo_comment_inner\">\n" +
                "                                            <div class=\"eskimo_comment_left\">\n" +
                "                                                "+image+"\n" +
                "                                            </div>\n" +
                "                                            <div class=\"eskimo_comment_right\">\n" +
                "                                                <div class=\"eskimo_comment_right_inner \">\n" +
                "                                                    <cite class=\"eskimo_fn\">\n" +
                "                                                        <a href=''>"+userName+"</a>\n" +
                "                                                    </cite>\n" +
                "                                                    <div class=\"eskimo_comment_links\">\n" +

                "                                                        <i class=\"fa fa-clock-o\"></i>"+time+" <button id='reply-btn'\"><i class=\"fa fa-reply\">回复</i></button>\n" +
                "                                                        <button class='delete_comment_btn'  ><i class=\"fa fa-times\">删除</i></button>      "+
                "<div id='comment_id' style='display: none'>"+comId+"</div>"+
                "<div class='comment_author_id' style='display: none'>"+authorId+"</div>"+

                "                                                    </div>\n" +
                "                                                    <div class=\"eskimo_comment_text\">\n" +
                "                                                        <p>"+comment+"</p>\n" +
                "                                                    </div>\n" +
                "                                                </div>\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n  <div id=\"reply-wrapper\">\n" +
                "                                <p><textarea id=\"reply-area\" name=\"comment\" cols=\"45\" rows=\"8\" required=\"required\"></textarea></p>"+
                "                                   <b style='color:red'></b>"+
                "                                <input name=\"submit\" type=\"button\" id=\"reply-submit\" class=\"btn btn-default\" value=\"Reply\" />\n" +
                "                            </div>"
                +"</div>";

            comList.append(commit);



        });
        //加载回复区

        $.ajax({
            type:"POST",
            url:"services/viewReply.php",
            dataType:"json",
            data:"passage_id="+passageId,
            success:function (dataFeedBack){
                //console.log(dataFeedBack);

                $.each(dataFeedBack,function (index,obj) {

                    reId=obj["id"];
                    userName=obj["UserName"];
                    authorId=obj["authorId"];
                    let replyToAdd=obj["content"];
                    imaId=obj["profile_image"];
                    nowTime=obj["created_time"];
                    image="<img alt='' src='../lib/uploads/2019/12/img"+imaId+".jpg' />";
                    let messId=obj["messageId"];
                    let selector="#commentlist> #comment_"+messId;
                    let reply="<div class=\"eskimo_comment_wrapper\" data-type='reply_wrapper'>\n" +
                        "                                    <div class=\"eskimo_comments\">\n" +
                        "                                        <div class=\"eskimo_comment\">\n" +
                        "                                            <div class=\"eskimo_comment_inner\">\n" +
                        "                                                <div class=\"eskimo_comment_left\">\n"
                        + image+
                        "</div>\n" +
                        "                                                <div class=\"eskimo_comment_right\">\n" +
                        "                                                    <div class=\"eskimo_comment_right_inner \">\n" +
                        "                                                        <cite class=\"eskimo_fn\">\n" +
                        "                                                            <a href=\"\">"+userName+"</a>" +
                        "                                                        </cite>\n" +
                        "                                                        <div class=\"eskimo_comment_links\">\n" +
                        "                                                            <i class=\"fa fa-clock-o\"></i>"+nowTime+


                        "                                                         <div id='reply_id' style='display: none'>"+reId+"</div>"+
                        "                                                           <div class='reply_author_id' style='display: none'>"+authorId+"</div>\n"+
                        "                                                        </div>" +
                        "                                                        <div class=\"eskimo_comment_text\">\n" +
                        "                                                            <p>"+replyToAdd+"</p>\n" +
                        "                                                        </div>\n" +
                        "                                                    </div>\n" +
                        "                                                </div>\n" +
                        "                                            </div>\n" +
                        "                                        </div>\n" +
                        "                                    </div>\n" +
                        "                                </div>";
                    $(selector).append(reply);
                    $(selector).addClass("hasReply");
                });


                console.log(dataFeedBack);
            }

        });
        //权限实现

        let $deleteComBtn=comList.find(".delete_comment_btn");
        //找不到元素
      //  let $deleteReBtn=$("#commentList .hasReply .delete_reply_btn");
            //comList.find(".eskimo_comment_wrapper.hasReply .delete_reply_btn");

       // let $userReId=$deleteReBtn.parent("#comment_id");
       //  console.log($deleteComBtn);
       //  console.log($deleteReBtn);

            console.log(Authority);
            console.log($deleteComBtn);
         //   console.log($deleteReBtn);
           $deleteComBtn.each(function(){
               let $userComId=$(this).siblings(".comment_author_id").html();
               console.log($userComId);
               console.log(UserId);
               //用户能删除自己的评论

              if(UserId===$userComId||Authority==="0"){
                  $(this).show();
              }
              // if()
              //  let $deleteReBtn= $(this).parents(".eskimo_comment_wrapper").find(".delete_reply_btn");
              // console.log($deleteReBtn);
           });
        //
        // $deleteReBtn.each(function(){
        //
        //     let $userReId=$(this).siblings(".reply_author_id").html();
        //     console.log($userReId);
        //     if(Authority==="0") {
        //         $(this).show();
        //
        //     }
        //     //用户能删除自己的评论
        //     if(UserId===$userReId){
        //         $(this).show();
        //     }
        // });





        //---------------------------------------------------
        //写一条评论

        $("#submit").on("click",function () {
            let $commentToAdd=$("#comment").val();
            //alert($commentToAdd);
            if($commentToAdd.length>=10){
                $("#comment").siblings("b").html("评论过长");
            }
            else{

            //let time=new Date();
          //  let nowTime=time.toDateString()+" "+time.toLocaleTimeString();
            //前后台格式不一致，干脆同样改成后台时间
            //ajax
            $.ajax({
                type:"POST",
                url:"services/addComment.php",
                dataType:"json",
                data:"content="+$commentToAdd+"&passage_id="+passageId,
                success:function (dataFeedBack) {
                    console.log(dataFeedBack);
                    //取回调的json数据   包括：用户名、头像（时间取前台，显示时取后台）
                    //append elements
                    //console.log(dataFeedBack);
                    userName=dataFeedBack["name"];
                    imaId=dataFeedBack["profile_image"];
                    mesId=dataFeedBack["message_id"];//最新一条评论
                    time=dataFeedBack["created_time"];
                    authorId=dataFeedBack["authorId"];


                    image="<img alt='' src='../lib/uploads/2019/12/img"+imaId+".jpg' />";
                    let commitToAdd=" <div class=\"eskimo_comment_wrapper\" id=\'comment_"+mesId+"\'>\n" +
                        "                                <div class=\"eskimo_comments\">\n" +
                        "                                    <div class=\"eskimo_comment\">\n" +
                        "                                        <div class=\"eskimo_comment_inner\">\n" +
                        "                                            <div class=\"eskimo_comment_left\">\n" +
                        "                                                "+image+"\n" +
                        "                                            </div>\n" +
                        "                                            <div class=\"eskimo_comment_right\">\n" +
                        "                                                <div class=\"eskimo_comment_right_inner \">\n" +
                        "                                                    <cite class=\"eskimo_fn\">\n" +
                        "                                                        <a href=''>"+userName+"</a>\n" +


                        "                                                    </cite>\n" +
                        "                                                    <div class=\"eskimo_comment_links\">\n" +
                        "                                                        <i class=\"fa fa-clock-o\"></i>"+time+" <button id='reply-btn'  \">Reply</button> <button class='delete_comment_btn' style='display:block' >Delete</button>  "+

                        "                                                    </div>\n" +
                        "                                                    <div class=\"eskimo_comment_text\">\n" +
                        "                                                        <p>"+$commentToAdd+"</p>\n" +
                        "                                                    </div>\n" +
                        "                                                </div>\n" +
                        "                                            </div>\n" +
                        "                                        </div>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n  <div id=\"reply-wrapper\">\n" +
                        "                                <p><textarea id=\"reply-area\" name=\"comment\" cols=\"45\" rows=\"8\" required=\"required\"></textarea></p>\n" +
                        "<b style='color:red'></b>"+
                        "                                <input name=\"submit\" type=\"button\" id=\"reply-submit\" class=\"btn btn-default\" value=\"Reply\" />\n" +
                        "                            </div>"
                        +"</div>";

                    $("#commentlist").append(commitToAdd);
                    $("#comment").siblings("b").html("");//clear tips
                    //   comList.children(".eskimo_comment_wrapper").children("#reply-wrapper").hide();

                }
            });

            //-------清除输入框
            $("#comment").val("");
        }});
        console.log(dataFeedBack);
    }


});
//回复评论

comList.on("click",selector1, function () {
    let $reply = $(this).parent().parent().parent().parent().parent().parent().siblings("#reply-wrapper");

    $reply.slideToggle();//添加动画


});

//评论回复-------------------------------
comList.on("click",selector2,function () {
    //alert("wow");
    //ajax
    let $btn=$(this);
    let $commentToFollow=$btn.parent().siblings(".eskimo_comments");
    let $textarea=$btn.siblings("p").children("textarea");
    let $replyToAdd=$btn.siblings("p").children("#reply-area").val();
    //alert($replyToAdd);
    let time=new Date();
    let nowTime=time.toDateString()+" "+time.toLocaleTimeString();
    //从前台ID属性中取到评论id
    let $mesId=$(this).parent().parent().attr("id").split("_")[1];
    //提示框
    let $tip=$(this).siblings("b");

    //alert("wow");
    //按键绑定没问题
    //====已修复-----------------
    $.ajax({
        type:"POST",
        url:"services/addReply.php",
        dataType:"json",
        data:"content="
            +$replyToAdd+
           "&passage_id="+passageId+
            "&message_id="+$mesId
        ,
        success:function (dataFeedBack) {
            console.log(dataFeedBack);
            if($replyToAdd.length>=140){

           $tip.html("回复过长");
            }
            else {
            userName=dataFeedBack["name"];
            imaId=dataFeedBack["profile_image"];//选的头像id

            image="<img alt='' src='../lib/uploads/2019/12/img"+imaId+".jpg'/>";
            let reply="<div class=\"eskimo_comment_wrapper\">\n" +
                "                                    <div class=\"eskimo_comments\">\n" +
                "                                        <div class=\"eskimo_comment\">\n" +
                "                                            <div class=\"eskimo_comment_inner\">\n" +
                "                                                <div class=\"eskimo_comment_left\">\n"
                + image+
                "</div>\n" +
                "                                                <div class=\"eskimo_comment_right\">\n" +
                "                                                    <div class=\"eskimo_comment_right_inner \">\n" +
                "                                                        <cite class=\"eskimo_fn\">\n" +
                "                                                            <a href=\"\">"+userName+"</a>\n" +
                "                                                        </cite>\n" +
                "                                                        <div class=\"eskimo_comment_links\">\n" +
                "                                                            <i class=\"fa fa-clock-o\">"+nowTime+"</i>\n"+

                "                                                        </div>\n" +
                "                                                        <div class=\"eskimo_comment_text\">\n" +
                "                                                            <p>"+$replyToAdd+"</p>\n" +
                "                                                        </div>\n" +
                "                                                    </div>\n" +
                "                                                </div>\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>";
            //前台添加回复
            $commentToFollow.after(reply);
            //-------清除输入框
            $textarea.val("");


        }}
    });



});



//删除回复
// comList.on("click",".delete_reply_btn",function () {
//     //获取这个回复的id
//    // alert("1231");
//     let $id=$(this).siblings("#reply_id");
//     let $block=$(this).parent().parent().parent().parent().parent().parent().parent();
//      $block.remove();
//
//      //　删库数据
//     $.ajax({
//         type:"POST",
//         url:"services/deleteReply.php",
//         data:"reId="+$id,
//         success:function (datafeedback) {
//             console.log(datafeedback);
//         }
//     });
// });

//删除评论

comList.on("click",".delete_comment_btn",function () {
    //获取这个回复的id
    // alert("1231");
    let $id=$(this).siblings("#comment_id").html();
    console.log($id);
    let $block=$(this).parent().parent().parent().parent().parent().parent().parent();
    $block.remove();
    $.ajax({
        type:"POST",
        url:"services/deleteMessage.php",
        data:"comId="+$id+"&userId="+UserId,
        success:function (datafeedback) {
            console.log(datafeedback);
        }
    });
});
// $(append).ready(function () {
//     $("#reply-wrapper").hide();
//     $("#reply-btn").on("click", function () {
//         let $reply = $(this).parent().siblings("#reply-wrapper");
//         $reply.toggle();
//     });
// });




