<?php

include("User.php");
include("database.php");
class UserContainer
{//备用容器类
    private $userArray = array();
    //private $db;

    function __construct()
    {
        //1.连接数据库
        //2.查询数据
        //3.判断权限(仅username=admin的用户为管理员)
        //4.


    }

//检查一致性
    function check($username, $password)
    {
    }
    function showAll(){
        var_dump($this->userArray);
    }
}
//$uc=new UserContainer();
//$uc->showAll();