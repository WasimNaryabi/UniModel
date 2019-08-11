<?php 
include("database_connection.php");
session_start();
if(isset($_POST['login'])){
$user_name = $_POST['user_name'];
$password  = $_POST['password'];

$select  = $pdo->prepare("SELECT * FROM secrecy where user_name ='$user_name'and password ='$password'");
	
	$select->setFetchMode(PDO::FETCH_ASSOC);
	$select->execute();
	$store_data = $select->fetch();
	$database_user_name = $store_data['user_name'];
	$database_password  = $store_data['password'];

	 
	$sec_id  = $store_data['secrecy_id'];
	$name  = $store_data['name'];
 
	 

	 if($user_name == $database_user_name and $password == $database_password ){

	 	$_SESSION['user_name'] = $database_user_name;
	 	$_SESSION['password']  = $database_password;
	 	  $_SESSION['name'] = $name ;
	 	 /*echo $_SESSION['name'];exit()
	 	 ;*/

	 
	 	$_SESSION['secrecy_id'] = $sec_id ;
	 	
 		$secrecy_id  = $_SESSION['secrecy_id'];
	 	header("location:../main_dashboard.php");
 	 }else{
 	 	header("location:../secrecy_login.php");
 	 }

}


 ?>