<?php
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");
include "../../pages/classes/input.php";

session_start();
var_dump( $_SESSION['user']);
$input=new input();
$db=new database();
$user=$_SESSION['user'];//取出对象
$title=$input->post("title");
$content=$input->post("content");
$image=$input->post("image");




$author_id=$user->Id;
$sql="INSERT INTO passages(title, content, author_id,image)
VALUES ('{$title}','{$content}','{$author_id}','{$image}')";
if($db->conn->query($sql)){

    echo "add passage successful!";

}