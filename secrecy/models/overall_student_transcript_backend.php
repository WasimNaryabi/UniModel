<?php

	include("database_connection.php");
session_start();
/* SESSION CREATION. */

	$secrecy_id = $_SESSION['secrecy_id'];
 
;
/* ======================================== Condition applied before entering to Secrecy - Home page ======================================== */

	if(!(isset($secrecy_id))) {
				header("location:secrecy_login.php");
		} else {

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */

			$query_select = $pdo->prepare("select * from secrecy where secrecy_id = '$secrecy_id';");
			 $query_select -> setFetchMode(PDO::FETCH_ASSOC);
			 $query_select->execute();

			$row = $query_select->fetch();
/* ======================================== Searching Student(s) Specific Catagory from Database ======================================== */

	if(isset($_POST['search'])) {
		
		$discipline = $_POST['discipline'];
		$session = $_POST['session'];
		$semester = $_POST['semester'];
		/*echo $discipline." / ".$session." / ".$semester;exit();*/
		$_SESSION['discipline'] = $discipline;
		$_SESSION['session'] = $session;
		$_SESSION['semester'] = $semester;
		
		$student_result = $pdo->prepare("select * from student as s, student_history as sh where s.discipline_id = '$discipline' and s.session_id = '$session' and
						   sh.semester_id = '$semester' and s.student_id = sh.student_id");
		 
		$student_result -> setFetchMode(PDO::FETCH_ASSOC);
			 $student_result->execute();
				$count = $student_result->fetch();
		
		if($count) {
				header("location:../display_overall_student_transcript.php");
			} else {
 
					echo '<script>
                        alert("No Record Found...");
                        location.replace("../overall_students_transcripts.php");
                    </script>';
 }			
		}
	}
?>