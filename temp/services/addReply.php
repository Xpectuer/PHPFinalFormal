<?php


include("../../pages/classes/input.php");
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");
session_start();


$input = new input();
$db = new database();
$user = $_SESSION['user'];//取出对象
//$id=$input->post("id");//前端注意name属性
$content = $input->post("content");
//$title=$input->post("title");
$userId = $user->Id;
$passageId=$input->post("passage_id");
$messageId =$input->post("message_id");//一个页面，根据每个评论的id不同，输出不同的内容
$sql = "INSERT INTO `reply`(`content`,`authorId`,`messageId`,`passage_id`) 
VALUES('{$content}','{$user->Id}','{$messageId}','{$passageId}')";

$response = array("name" => $user->username, "profile_image" => $user->authority);
if ($db->conn->query($sql)) {
    echo json_encode($response);
    //echo $user->username;

}
