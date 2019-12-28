<?php
session_start();

//登录后302跳转回登录前的页面
   // echo "<script language=javascript>alert ('要访问的页面需要先登录。');</script>";
    $_SESSION['userURL'] = $_SERVER['HTTP_REFERER'];
    header("Location:../../pages/login/login.html");
   // echo '<script language=javascript>window.location.href="login.php"</script>';
//用于记录登录前的URL