<?php
include ("../../pages/classes/User.php");


session_start();
$user=$_SESSION["user"];

if(!isset($_SESSION['user'])){
    die("Get The Fuck Out OF Here!");
}

?>
<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>编辑器</title>


<!-- github.io delivers wrong content-type - but you may want to include FontAwesome in 'wysiwyg-editor.css' -->

  <link href="../../lib/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../../lib/jquery-notebook-master/style.css">

  <link rel="stylesheet" type="text/css" href="../../lib/jquery-notebook-master/src/js/jquery.notebook.css">




</head>

<body>








<div style="width:860px; margin: 30px auto;">
<p>标题</p>
<input type="text" id="title" name="title"/>
<p>内容</p>
<div class="editor">
  <p>enter something here</p>
</div>

  <button type="button" id="btn">提交</button>

</div>






<script src="../../lib/js/jquery/jquery.min.js"></script>
<script src="../../lib/jquery-notebook-master/src/js/jquery.notebook.js"></script>
<script>


  //  $("#btn").on("click",function () {
  //    let $title=$('#title').val();
  //    let $content=$('#editor1').val();
  //     xhr= $.ajax({
  //        type:"POST",
  //        url:"addPassage.php",
  //       async:false,
  //       contentType:"application/x-www-form-urlencoded",
  //       data:"title="+$title+"&content="+$content,
  //       success:function (dataFeedBack) {
  //         console.log(dataFeedBack);
  //         console.log($title+$content);
  //       }
  //
  //
  //
  //
  //      })
  //  });
  //初始化插件
  $('.editor').notebook({

    autoFocus: true,

    placeholder: 'Type something awesome...'

  });

  let id=GetQueryString("id");
  //let content=GetQueryString("content");
  let title;
  let content;
  let title_block=$("#title");
  let content_block=$(".editor");
  //console.log(content_block);


  $.ajax({
    type:"post",
    url:"services/viewPassage.php",
    dataType:"json",
    data:"passage_id="+id,

    success:function (datafeedback) {
      console.log(datafeedback);
      console.log(content_block);
      title=datafeedback["title"];
      content=datafeedback["content"];
      //填充原内容
      title_block.val(title);
     // content_block.focus();
      content_block.html(content);
//--------------
    }

  });
  content_block.bind('DOMSubtreeModified',function (e) {
    content=$(this).html();
    console.log(content);
  });





  $("#btn").on("click",function () {
    let $id=GetQueryString("id");
    console.log($id);
    // let $block=$(this).parent().parent().parent();
    // $block.append();
    let $title=$("#title").val();

    let $content=content;
    console.log($content);
    $.ajax({
      type:"POST",
      url:"services/modify.php",
      data:"title="+$title+"&content="+$content+"&id="+$id,
      success:function (datafeedback) {
        console.log(datafeedback);
        window.location.href="services/admin.php";

      }

    });
   // console.log("error");
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


</script>
</body>

</html>

