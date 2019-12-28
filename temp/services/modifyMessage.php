<?php
include("../../pages/classes/input.php");
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");


$input=new input();
$db=new database();
$id=$input->post("id");//前端注意name属性
$new_content=$input->post("content");
    $new_title=$input->post("title");
$sql="UPDATE `passages` SET `content`='{$new_content}',`title`='{$new_title}' WHERE id='{$id}'";
if($db->conn->query($sql)){
    echo $id;
    echo $title;
    echo $new_content;
    echo "success";
}else{
    $db->conn->error;
}