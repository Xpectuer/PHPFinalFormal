<?php
//查看最近三篇文章
//或者
//所有文章

include("../../pages/classes/input.php");
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");
//显示文章
$input=new input();
$db=new database();


$mode=$input->get("mode");

//1.mode=INDEX 2.mode=ALL


//搜索关键词

$sql_index="SELECT passages.id,passages.title,passages.content,passages.time,passages.image,users.UserName FROM passages
    LEFT JOIN users ON passages.author_id = users.Id  order by passages.time desc limit 0,3";

$sql_all="SELECT passages.id,passages.title,passages.content,passages.time,passages.image,users.UserName FROM passages
    LEFT JOIN users ON passages.author_id = users.Id order by passages.time desc";


$response=array();
if($mode==="INDEX"){
    if($result=$db->conn->query($sql_index)){
        for($i=0;$i<$result->num_rows;$i++)
            $response[$i]=$result->fetch_assoc();

        echo json_encode($response);
    }else{echo "passages get failed!";}
}

else if($mode==="ALL"){
    if($result=$db->conn->query($sql_all)){
        for($i=0;$i<$result->num_rows;$i++)
            $response[$i]=$result->fetch_assoc();

        echo json_encode($response);
    }else{echo "passages get failed!";}
}
else if($mode==="SEARCH"){
    $keywords = $input->get("keywords");
    $sql_search="SELECT passages.id,passages.title,passages.content,passages.time,passages.image,users.UserName FROM passages
    LEFT JOIN users ON passages.author_id = users.Id where passages.title like '%".$keywords."%' order by passages.time desc";


    if($result = $db->conn->query($sql_search)){
        for($i=0;$i<$result->num_rows;$i++){
            $response[$i]=$result->fetch_assoc();
        }
    }


        echo(json_encode($response));
    }

else{
    echo "ajax request failed!";
}

  //请求成功


