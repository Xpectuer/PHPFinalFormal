<?php

//根据ID查看内容
include("../../pages/classes/input.php");
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");
//显示评论
session_start();
$input = new input();
$db = new database();
$user=$_SESSION["user"];
$user_id=$user->Id;
//$passageId = 1;//$input->get("id");

$mode=$input->post("mode");
/*
 * mode=0 最近发言
 * mode=1 所有该用户的发言
 *
 * */

if($mode==="0") {
    $sql = "SELECT message.id,content,message.authorId,users.UserName,message.created_time FROM `message`
    LEFT JOIN users ON message.authorId=users.Id where message.authorId='{$user_id}' order by message.created_time desc limit 0,3";
    $result = $db->conn->query($sql);
    $response = array();
    for ($i = 0; $i < $result->num_rows; $i++) {
        $response[$i] = $result->fetch_assoc();
    }
    echo(json_encode($response));
}
if($mode==="1"){
    $sql = "SELECT message.id,content,message.authorId,users.UserName,message.created_time FROM `message`
    LEFT JOIN users ON message.authorId=users.Id where message.authorId='{$user_id}' order by message.created_time desc";
    $result = $db->conn->query($sql);
    $response = array();
    for ($i = 0; $i < $result->num_rows; $i++) {
        $response[$i] = $result->fetch_assoc();
    }
    echo(json_encode($response));
}


//存取内容