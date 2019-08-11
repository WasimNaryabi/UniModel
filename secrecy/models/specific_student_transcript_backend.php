<?php
 

	include("database_connection.php");
session_start();
/* SESSION CREATION. */

	$secrecy_id = $_SESSION['secrecy_id'];
/*echo $secrecy_id ;exit;*/
/* ======================================== Condition applied before entering to Secrecy - Home page ======================================== */

	if(!(isset($secrecy_id))) {
				header("location:../secrecy_login.php");
		} else {

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */

			$query_select = $pdo->prepare("select * from secrecy where secrecy_id = '$secrecy_id';");
			 $query_select->setFetchMode(PDO::FETCH_ASSOC);
			 $query_select->execute();
			$row  = $query_select->fetch();

/* ======================================== Searching Student(s) Specific Catagory from Database ======================================== */

	if(isset($_POST['search'])) {
		 
		$discipline = $_POST['discipline'];
		$session = $_POST['session'];
		$semester = $_POST['semester'];
		$roll_number = $_POST['roll_number'];
		/*echo $discipline." / ".$session." / ".$semester." / ".$roll_number;exit();*/
		$_SESSION['discipline'] = $discipline;
		$_SESSION['session'] = $session;
		$_SESSION['semester'] = $semester;
		$_SESSION['roll_number'] = $roll_number;
		
		$student_transcript = $pdo->prepare("select * from student as s, student_history as sh where s.discipline_id = '$discipline' and s.session_id = '$session' and
							   sh.semester_id = '$semester' and s.roll_number = '$roll_number' and s.student_id = sh.student_id");
		 	$student_transcript->setFetchMode(PDO::FETCH_ASSOC);
			 $student_transcript->execute();
			$count  = $student_transcript->fetch();
		/*print_r($count);exit();done working*/
		if($count) {

			/* SESSION CREATION. */

			
			echo '<script>
                         
                        location.replace("../display_specific_student_transcript.php");
                    </script>	';

			} else {
 
					echo '<script>
                        alert("No Record Found...");
                        location.replace("../specific_student_transcript.php");
                    </script>	';
 			
		}
	}
}
?>
