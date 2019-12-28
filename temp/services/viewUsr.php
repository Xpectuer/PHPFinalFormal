<?php

//根据ID查看内容
include("../../pages/classes/input.php");
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");
session_start();
//显示评论
$input = new input();
$db = new database();


if(isset($_SESSION["user"]))
{
$user=$_SESSION["user"];
//var_dump($user);
$response = array("id"=>$user->Id,
    "username"=>$user->username,
    "email"=>$user->email,
    "phoneNr"=>$user->phoneNr,
    "authority"=>$user->authority,
        "profile_image"=>$user->profile_image);
      echo json_encode($response);
}
else{
    echo "别急，还没登录呢~";
}
