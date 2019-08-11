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
	
	if(isset($_POST['search_name'])){
		
		$first_name = $_POST['first_name'];
		 $last_name = $_POST['last_name'];  
		 $father_name = $_POST['father_name']; 

		  
				 
/* ======================================== Search Specific Student By Name for Retrival of Record ======================================== */
	
    $query_select = $pdo->prepare("SELECT * from student where first_name = '$first_name'  and last_name ='$last_name' and father_name = '$father_name'");
	$query_select->setFetchMode(PDO::FETCH_ASSOC);
    $query_select->execute();
    $count  = $query_select->fetch();
		
		if($count) {
			
			 

/* SESSION generation */

			$_SESSION['student_id'] = $count['student_id'];			

			header("location:../specific_student_fullRecord.php");
		
		} else { 

	?>	 		
			        <script>
                        alert("Incorrect First or Last name");
						location.replace("../search_student.php");
                    </script>
<?php
			}
	}
?>

<?php

/* Search Student Procedure */
	
	if(isset($_POST['search'])){
		
		$session = $_POST['session'];
		$discipline = $_POST['discipline'];
		$roll_number = $_POST['roll_number'];
					
/* ======================================== Search Specific Student By Registration No. for Retrival of Record ======================================== */
	
    $query_select = $pdo->prepare("select * from student where session_id = '$session' and discipline_id = '$discipline' and roll_number = '$roll_number';");
    $query_select->setFetchMode(PDO::FETCH_ASSOC);
    $query_select->execute();
    $count  = $query_select->fetch();
	 
		
		if($count) {
			
			 

/* SESSION generation */

			$_SESSION['student_id'] = $count['student_id'];			
?>
				<script>
					location.replace("../specific_student_fullRecord.php");
				</script>
<?php
		header("location:../specific_student_fullRecord.php");
		
		} else {
?>
					<script>
                        alert("Incorrect Registration No. or Password...");
                        location.replace("../search_student.php");
                    </script>
<?php
		}
	}
?>
