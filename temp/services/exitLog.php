<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['userURL']);

echo $_SERVER["HTTP_REFERER"];

//header("Location:../../index.php");
