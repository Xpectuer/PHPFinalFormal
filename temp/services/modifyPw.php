<?php
include("../../pages/classes/input.php");
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");

session_start();
$input=new input();
$db=new database();
$user=$_SESSION["user"];
$id=$user->Id;

$original_pw=md5($input->post("origin"));
$new_pw=md5($input->post("new"));
echo $id;

$sql="SELECT PassWord FROM  users WHERE PassWord='{$original_pw}'";
$result=$db->conn->query($sql);

if($result){
    $sql1="UPDATE users SET PassWord='{$new_pw}' WHERE Id='{$id}'";
    if($db->conn->query($sql1)){
    echo "VALID";
    }else {
        echo "MODIFY FAILED";
    }
}else{
    echo "INVALID";
}