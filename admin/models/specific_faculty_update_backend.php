<?php 
include("database_connection.php");
session_start();
/* ======================================== Profile Updation Procedure ======================================== */

	if(isset($_POST['update'])){ 
		$key = $_POST['id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$father_name = $_POST['father_name'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
		$mobile_number = $_POST['mobile'];
		$address = $_POST['address'];
		$city = $_POST['city']; 
		$cnic = $_POST['cnic'];
		$faculty_id = $_POST['id']; 
		
		$query_faculty = $pdo->query("update faculty set first_name = '$first_name', last_name = '$last_name', father_name = '$father_name', gender = '$gender', 
						  address = '$address', date_of_birth = '$date_of_birth', mobile_number = '$mobile_number',city_name = '$city',cnic = '$cnic' where faculty_id = '$key';");

		 
		
		if($query_faculty) {

?>
			<script>
				alert("Profile Updated...");
				location.replace("../specific_faculty_update.php?id=<?php echo $faculty_id; ?>");
            </script>
<?php
		}
	}
?>

 