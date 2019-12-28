<?php
//根据ID查看内容
include("../../pages/classes/input.php");
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");
//显示评论

$input=new input();
$db=new database();


$passageId=$input->post("passage_id");
$sql="SELECT reply.id,content,authorId,users.UserName,users.profile_image,reply.messageId,reply.created_time FROM `reply` 
    left JOIN users ON reply.authorId=users.Id where reply.passage_id={$passageId} order by reply.created_time desc";
$result=$db->conn->query($sql);
$response=array();
for($i=0;$i<$result->num_rows;$i++){
    $response[$i] = $result->fetch_assoc();
}
echo (json_encode($response));
//$response=

//存取内容