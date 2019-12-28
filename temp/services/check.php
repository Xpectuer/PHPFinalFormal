<?php
//用户登录检验
//ini_set('display_errors', 'On');
session_start();

include('../pages/classes/input.php');
include('../pages/classes/database.php');
include('../pages/classes/User.php');
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
        //分配权限功能
        if ($row = mysqli_fetch_assoc($mysqli_result)) {
            //在会话域中保存对象
            $user=new User();
            $user->Id=$row["id"];
            $user->username=$row["UserName"];
            $user->password=$row["PassWord"];
            $user->authority=$row["Authority"];
            $_SESSION['user'] = $user;

            //echo "Success!";
            //****管理员权限拥有不同功能
            if($user->authority==="0"){
                header("Location:Admin/index.php");
            }
            else{
                header("Location:Guests/index.php");
            }
        }else {
            echo "登录失败，账号或密码错误！";
            exit;
        }
}
?>
