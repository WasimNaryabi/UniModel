<?php 
include("database_connection.php");
$user = @$_SESSION['user'];
$pass = @$_SESSION['password'];
$select = $pdo->prepare("SELECT * FROM student WHERE uni_reg_number = '$user' and password = '$pass' ");
	
	$select->setFetchMode(PDO::FETCH_ASSOC);
	$select->execute();
	$data = $select->fetch();


 ?>