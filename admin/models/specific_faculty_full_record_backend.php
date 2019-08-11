<?php 
include("database_connection.php");
session_start();
/* SESSION CREATION. */

	$admin_id = $_SESSION['admin_id'];

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */

		$query_select = $pdo->prepare("select * from admin where admin_id = '$admin_id';");
		$query_select->setFetchMode(PDO::FETCH_ASSOC);
	    $query_select->execute();
	    $row  = $query_select->fetch();
			
/* ======================================== Search Student Procedure ======================================== */
	
	if(isset($_POST['search'])){
	 
		
		$full_name = $_POST['full_name'];

/* ======================================== Search Specific faculty By Name for Retrival of Record ======================================== */
	
    $query_select = $pdo->prepare("SELECT * FROM faculty where CONCAT(first_name, ' ', last_name) = '$full_name' ");

	$query_select->setFetchMode(PDO::FETCH_ASSOC);
    $query_select->execute();
    $count  = $query_select->fetch();
		 
		if($count) {
			 
			
			 

/* SESSION generation */

			$_SESSION['faculty_id'] = $count['faculty_id'];			

			header("location:../specific_faculty_fullRecord.php");
		
		} else { 

	?>	 		
			        <script>
                        alert("Incorrect Data Fetching");
						location.replace("../search_faculty.php");
                    </script>
<?php
			}
	}
?>

 