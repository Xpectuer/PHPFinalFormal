<?php
//用户登录检验
//ini_set('display_errors', 'On');
session_start();

include('../classes/input.php');
include('../classes/database.php');
include('../classes/User.php');
$input=new input();//输入对象
$db =new database();//数据库对象

    $username = $input->post('username');
    $password = md5($input->post('password'));
    $sql = "SELECT * FROM `users` WHERE `UserName`='"
        .mysqli_real_escape_string($db->conn,$username).
        "'and `PassWord`='".
        mysqli_real_escape_string($db->conn,$password).
        "'limit 1";
    //SQL注入漏洞，已用转义函数填补
    if ($mysqli_result = $db->conn->query($sql)) {
        if ($row = mysqli_fetch_assoc($mysqli_result)) {
            //在会话域中保存对象
            $user=new User();
            $user->Id=$row["Id"];
            $user->username=$row["UserName"];
            //$user->password=$row["PassWord"];
            $user->email=$row["Email"];
            $user->phoneNr=$row["PhoneNr"];
            $user->authority=$row["Authority"];
            $user->profile_image=$row["profile_image"];

            $_SESSION['user'] = $user;

            echo $_SESSION["userURL"] ;
        }else {
            echo false;//账号或密码错误
            exit;
        }
}
?>
