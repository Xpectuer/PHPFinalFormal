<?php


include("../classes/input.php");
//include("../pages/classes/User.php");
include("../classes/database.php");
session_start();


$input = new input();
$db = new database();


$name=$input->post("username");
$passwd=$input->post("password");
$email=$input->post("email");
$phone_number=$input->post("phone_number");



$sql = "INSERT INTO `users`(UserName, PassWord, Email, PhoneNr) 
VALUES('{$name}','{$passwd}','{$email}','{$phone_number}')";
$result=$db->conn->query($sql);
if($result){
    header("Location:login.html");
}
else{
    print_r($db->conn->error);
}