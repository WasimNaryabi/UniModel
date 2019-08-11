<?php 
include("database_connection.php");
session_start();
if(isset($_POST['login'])){
$user_name = $_POST['user_name'];
$password  = md5($_POST['password']);

$select  = $pdo->prepare("SELECT * FROM admin where user_name = '$user_name'and password = '$password' ");
	
	$select->setFetchMode(PDO::FETCH_ASSOC);
	$select->execute();
	$store_data = $select->fetch();
	$database_user_name = $store_data['user_name'];
	$database_password  = $store_data['password'];
	$database_picture_path  = $store_data['picture_path'];
	$admin_admin_id  = $store_data['admin_id'];

	$member_name = $store_data['first_name']." ".$store_data['last_name'];
	 

	 if($user_name == $database_user_name and $password == $database_password ){

	 	$_SESSION['user_name'] = $database_user_name;
	 	$_SESSION['password']  = $database_password;

	 	$_SESSION['name']  = $member_name;
	 	$_SESSION['picture_path']  = $database_picture_path;
	 	/**/
	 	$_SESSION['admin_id'] = $admin_admin_id;
		$admin_id = $_SESSION['admin_id'];

			
/* ======================================== Admin - Login History Procedure ======================================== */
	
		$login_time = date("h:i A");
		$login_date = date("D, d/m/Y");
		$login_ip1 = exec("hostname");
		$login_ip2 = gethostbyname($login_ip1);
		$login_ip = $login_ip1." - ".$login_ip2;
		
		if(date("h:i AM")) {
			$login_time = date("h:i")." PM";
			}
		else if(date("h:i PM")) {
				$login_time = date("h:i")." AM";
			}

		
		$insert_login_history =$pdo->query("INSERT INTO admin_login_history
								 VALUES('','$admin_id','$login_time','$login_date','$login_ip')");
		/*echo $admin_id." / ".$login_time." / ".$login_time." / ".$login_ip;exit();*/
		/*if($insert_login_history){
			echo "testing";}
			else{
				echo "not working";exit();
			}*/

		 
	 
 
	 	header("location:../main_dashboard.php");
 	 }else{
 	 	echo "Password or userName Not correct";
 	 }
		}

 


 ?>