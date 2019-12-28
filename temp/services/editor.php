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
<div style="background-color: #e9ecef">


<!--<form id="form1">-->
<!--  <div class="img-box">-->
<!--    <input type="file" name="photo1" id="" title="文件不超过200kb,大小最佳为60*60">-->
<!--  </div>-->
<!--  <button onclick="fsubmit()"/>-->
<!--  发布图片-->
<!--  </button>-->
<!--</form>-->
<div style="width:860px; margin: 30px 30px;">
<form action="post" id="form">
         封面图<input type="file" id="file" name="file"/></br>
</form>







<div style="width:860px; margin: 30px auto;">
  <p>标题</p>


  <input type="text" id="title" name="title"/>
  <p>内容</p>
  <div class="editor">
    <p>enter something here</p>
  </div>

</div>
  <button type="button" id="btn">提交</button>

</div>




</div>

<script src="../../lib/js/jquery/jquery.min.js"></script>
<script src="../../lib/jquery-notebook-master/src/js/jquery.notebook.js"></script>
<script src="../../lib/js/jquery/jquery.form.js"></script>
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


  //
  // function fsubmit() {
  //   var form1=document.getElementById("form1");
  //   var fd =new FormData(form1);
  //   $.ajax({
  //     url: "services/addIMG.php",
  //     type: "POST",
  //     data: fd,
  //     processData: false,
  //     contentType: false,
  //     success: function(response,status,xhr){
  //       console.log(response);
  //       let json=$.parseJSON(response);
  //       let result = '';
  //       result += '<br/><img src="' + json['photo1'] + '" height="100" />';
  //       result += '<br/>' + json['photo1'];
  //       $('#result').html(result);
  //     }
  //   });
  //   return 0;
  // }





    //------




  $('.editor').notebook({

    autoFocus: true,

    placeholder: 'Type something awesome...'

  });

  // let id=GetQueryString("id");
  //let content=GetQueryString("content");
  let title;
  let content;
  let title_block=$("#title");
  let content_block=$(".editor");
  let $image;
  //console.log(content_block);
 // let imgs=[];//存储图片链接
  //为文件上传添加change事件
  let fileM=document.querySelector("#file");
  $("#file").on("change",function(){
    console.log(fileM.files);
    //获取文件对象，files是文件选取控件的属性，存储的是文件选取控件选取的文件对象，类型是一个数组
    let fileObj=fileM.files[0];
    //创建formdata对象，formData用来存储表单的数据，表单数据时以键值对形式存储的。
    let formData=new FormData();
    formData.append('file',fileObj);
    console.log(formData);
// //创建ajax对象
//     let ajax=new XMLHttpRequest();
//     //发送POST请求
//     ajax.open("POST","services/addIMG.php",true);
//
//     ajax.onreadystatechange=function(){
//       if (ajax.readyState == 4) {
//         if (ajax.status>=200 &&ajax.status<300||ajax.status==304) {
//           console.log(ajax.responseText);
//           var obj=JSON.parse(ajax.responseText);
//           alert(obj.msg);
//           if(obj.err == 0){
//             //上传成功后自动动创建img标签放在指定位置
//             var img =$("<img src='"+obj.msg+"' alt='' />");
//             $(".con").append(img);
//             imgs.push(obj.msg);
//           }else{
//             alert(obj.msg);
//           }
//         }
//       }
//     };
    //  ajax.send(formData);
    //------
    $.ajax({
      type:"POST",
      url:"services/addIMG.php",
      processData:false,
      contentType:false,

      data:formData,
      success:function (datafeedback) {
        console.log(datafeedback);

        //alert(obj.msg);

          //上传成功后自动动创建img标签放在指定位置
          let img =$("<img src='"+datafeedback["msg"]+"' alt='' />");
          $(".con").append(img);
     //     imgs.push(datafeedback);

          console.log(datafeedback);
          $image=datafeedback;

      }
    });






  });
  //   $.ajax({
  //     type:"post",
  //     url:"services/viewPassage.php",
  //     dataType:"json",
  //     data:"passage_id="+id,
  //
  //     success:function (datafeedback) {
  //       console.log(datafeedback);
  //       console.log(content_block);
  //       title=datafeedback["title"];
  //       content=datafeedback["content"];
  //       //填充原内容
  //       title_block.val(title);
  //       // content_block.focus();
  //       content_block.html(content);
  // //--------------
  //     }
  //
  //   });
  content_block.bind('DOMSubtreeModified',function (e) {
    content=$(this).html();
    console.log(content);
  });





  $("#btn").on("click",function () {
    // let $id=GetQueryString("id");
    //console.log($id);
    // let $block=$(this).parent().parent().parent();
    // $block.append();
    let $title=$("#title").val();

    let $content=content;
    console.log($content);
    $.ajax({
      type:"POST",
      url:"services/addPassage.php",
      data:"title="+$title+"&content="+$content+"&image="+$image,
      success:function (datafeedback) {
        console.log(datafeedback);
        window.location.href="services/admin.php";

      }

    });
    // console.log("error");
  });



  // $("#btn").on("click",function () {
  //   let $id=GetQueryString("id");
  //   console.log($id);
  //   // let $block=$(this).parent().parent().parent();
  //   // $block.append();
  //   let $title=$("#title").val();
  //   let $image=$("#image");
  //   let $content=content;
  //   console.log($content);
  //   $.ajax({
  //     type:"POST",
  //     url:"services/modify.php",
  //     data:"title="+$title+"&content="+$content+"&id="+$id+"&image"+$image,
  //     success:function (datafeedback) {
  //       console.log(datafeedback);
  //       window.location.href="services/admin.php";
  //
  //     }
  //
  //   });
  //   // console.log("error");
  // });








</script>
</body>

</html>

