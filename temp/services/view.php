<?php
//根据ID查看内容
include("../../pages/classes/input.php");
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");
//显示评论
$input=new input();
$db=new database();

$id=$input->post("id");

$sql="SELECT message.id,content,authorId,users.UserName,users.profile_image,message.created_time FROM `message` 
    left JOIN users ON message.authorId=users.Id where message.passageId={$id} order by message.created_time desc;";
$result=$db->conn->query($sql);
$response=array();
for($i=0;$i<$result->num_rows;$i++){
    $response[$i] = $result->fetch_assoc();

}
echo (json_encode($response));
//$response=

//存取内容
