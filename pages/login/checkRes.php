<?php
include("../classes/database.php");
include("../classes/input.php");
include("../classes/User.php");


//初始化对象
$db=new database();
$input=new input();
//仅判断用户名是否重名

$username=$input->post("username");
$sql="SELECT UserName FROM users WHERE UserName='{$username}'";
$result=$db->conn->query($sql)->fetch_row();
//echo $result;
if(empty($result)){
    echo "Yes!";
}
else{
    echo"名字都写歪来！爪巴爪巴爪巴";
}
