<?php 
include("database_connection.php");
session_start();
if(isset($_POST['login'])){
$user_name = $_POST['user_name'];
$password  = $_POST['password'];

$select  = $pdo->prepare("SELECT * FROM faculty where user_name ='$user_name'and password ='$password'");
	
	$select->setFetchMode(PDO::FETCH_ASSOC);
	$select->execute();
	$store_data = $select->fetch();
	$database_user_name = $store_data['user_name'];
	$database_password  = $store_data['password'];

	$database_picture_path  = $store_data['picture_path'];
	$faculty_id  = $store_data['faculty_id'];

	$member_name = $store_data['first_name'].$store_data['last_name'];
	 

	 if($user_name == $database_user_name and $password == $database_password ){

	 	$_SESSION['user_name'] = $database_user_name;
	 	$_SESSION['password']  = $database_password;

	 	$_SESSION['name']  = $member_name;
	 	$_SESSION['picture_path']  = $database_picture_path;
	 	$_SESSION['faculty_id'] = $faculty_id ;
 
	 	header("location:../main_dashboard.php");
 	 }else{
 	 	echo "Password or userName Not correct";
 	 }

}


 ?>