<?php
include("../pages/classes/input.php");
include("../pages/classes/User.php");
include("../pages/classes/database.php");

//...


$db=new database();

$keywords = $_POST['keywords'];

$result = $db->conn->query("select * from message where title like '" . $keywords . "%'");

if ($result) {

    while ($row = $result->fetch_array()) {

        $temp[] = $row;

    }

    echo(json_encode($temp));
}

