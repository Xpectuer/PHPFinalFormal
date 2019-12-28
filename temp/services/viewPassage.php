<?php
//根据ID查看内容
include("../../pages/classes/input.php");
include("../../pages/classes/User.php");
include("../../pages/classes/database.php");
//显示文章
$input=new input();
$db=new database();


$passageId=$input->post("passage_id");
//$passageContent=$input->post("passage_content");


$sql="SELECT passages.title,passages.content,passages.time,passages.image,users.UserName FROM passages
    LEFT JOIN users ON passages.author_id = users.Id where passages.id={$passageId} ";



if($result=$db->conn->query($sql)){
$response=$result->fetch_assoc();
echo json_encode($response);
}
else{echo "passage get failed!";}