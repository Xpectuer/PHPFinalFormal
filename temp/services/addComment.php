<?php

include("../../pages/classes/input.php");
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");
session_start();


$input=new input();
$db=new database();
$user=$_SESSION['user'];//取出对象
//$id=$input->post("id");//前端注意name属性


//$title=$input->post("title");

$userId=$user->Id;
//一个页面，根据每个文章的id不同，输出不同的内容
//获取文章编号
$passsage_id=$input->post("passage_id");
$content=$input->post("content");

$sql="INSERT INTO `message`(`content`,`authorId`,`passageId`) 
VALUES('{$content}','{$user->Id}','{$passsage_id}')";


if($db->conn->query($sql)){
    //找到最新那条评论
    $sql2= "SELECT id, created_time,ABS(NOW() - created_time)  AS diffTime
FROM message
ORDER BY diffTime
LIMIT 0, 1";
   // sleep(3);
    if($result=$db->conn->query($sql2)) {
        $row=$result->fetch_assoc();
        $response = array("name" => $user->username,
            "profile_image" => $user->authority,
            "message_id" => $row["id"],
            "created_time"=>$row["created_time"]);
        echo json_encode($response);
    }else{
        echo"message id query failed!";
    }


    //echo $user->username;

}else{
    echo "message added failed!";
}

//echo "added successfully!";