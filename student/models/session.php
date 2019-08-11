<?php 
include("database_connection.php");
if($_SESSION['user'] == ""){
	header("location:../student_login.php?msg=Please Provide Correct Info...");
}

 ?>