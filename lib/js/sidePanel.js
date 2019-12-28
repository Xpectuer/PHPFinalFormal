//ajax加载内容

/*
* generate for sidePanel
* */

let $side_username = $("#side_username");
let $side_authority = $("#side_authority");
let $side_attachments = $("#side_attachments");
let $side_profile_image = $("#side_profile_image");
let $side_management = $("#side_management");
let $side_login=$("#side_login");
let $side_logout=$("#side_logout");
let $side_recent_post=$("#recent-post");
let $side_about=$("#side_about");

//user data
let UserId;
let Authority;


$.ajax({
    type: "POST",
    url: "services/viewUsr.php",
    dataType: "json",
    success: function (datafeedback) {

        //profile部分
        //alert(datafeedback);
        //console.log(datafeedback["authority"]);
        $side_username.html(datafeedback["username"]);
        $side_attachments.html("E-mail: " + datafeedback["email"] + "<br>" +
            "Tel: " + datafeedback["phoneNr"]);
        $side_profile_image.attr("src", "../lib/uploads/2019/12/img" + datafeedback["profile_image"] + ".jpg");
        switch (datafeedback["authority"]) {
            case "0":
                $side_authority.html("管理员");
                $side_management.show();
                $side_logout.show();
                $side_login.hide();
                $side_recent_post.show();
                break;
            case "1":
                $side_authority.html("普通用户");
                $side_logout.show();
                $side_login.hide();
                $side_recent_post.show();
                $side_about.show();

                break;
            default:


        }
        //取得用户id
        UserId=datafeedback["id"];
        Authority=datafeedback["authority"];
        console.log(datafeedback);
    }


});


//最近发言

let $side_dialogs=$("#side_dialogs");
let $side_dialog_block;
$.ajax({
    type:"POST",
    url:"services/viewByUser.php",
    dataType:"json",
    data:"mode=0",

    success:function (datafeedback) {
        console.log(datafeedback);
        $side_dialogs.empty();
        $.each(datafeedback,function(index,obj){
            console.log(obj);

            $side_dialog_block= "<li>\n" +
                "    <a>"+obj["content"]+"</a>\n" +
                "    <span className=\"post-date\">"+obj["created_time"]+"</span>\n" +
                "</li>";
            $side_dialogs.append($side_dialog_block);

        });


    }

});



//登出
$side_logout.on("click",function () {
   $.ajax({
       url: "services/exitLog.php",
       success:function (respond) {
        console.log(respond);
       }
   })
});