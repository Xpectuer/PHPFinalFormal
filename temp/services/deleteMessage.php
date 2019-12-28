<?php
include("../../pages/classes/database.php");
include("../../pages/classes/input.php");
include ("../../pages/classes/User.php");
session_start();
$db = new database();
$input=new input();
$userId=$input->post("userId");
if($_SESSION['user']->authority!==0&$_SESSION['user']->Id!==$userId){
    die("Get the fuck out of here!");
}

$id=$input->post("comId");
$sql_reply="DELETE FROM `reply` WHERE messageId='{$id}'";
$sql_mes="DELETE FROM `message` WHERE id='{$id}'";


//先删回复，再删评论

if($db->conn->query($sql_reply)){
    echo "reply delete successfully";
}
else{
    echo "reply delete failed or no reply remain";
}
if($db->conn->query($sql_mes)){
    echo "comment delete successfully";
}else{
    echo "comment delete failed.";
}




