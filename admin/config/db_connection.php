<?php

//date_default_timezone_set('Asia/Karachi');

$user = "root";
$password = "";

$connection = mysqli_connect("localhost",$user,$password,'portal');
#mysqli_select_db("portal", $connection);

session_start();

?>
