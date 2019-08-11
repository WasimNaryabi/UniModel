<?php 
include("database_connection.php");
if($_SESSION['user_name'] == "" and $_SESSION['password']==""){
	header("location:../faculty_login.php?msg=Please Provide Correct Info...");
}

 ?>