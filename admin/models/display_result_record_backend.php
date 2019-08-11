<?php

	error_reporting(0);

	include("config/db_connection.php");	 
/* ======================================== Searching Student(s) Specific Catagory from Database ======================================== */

	if(isset($_POST['display'])) {
		
		$discipline = $_POST['discipline'];
		$session = $_POST['session'];
		$semester = $_POST['semester'];
		
		$_SESSION['discipline'] = $discipline;
		$_SESSION['session'] = $session;
		$_SESSION['semester'] = $semester;
		
		$student_result = "select * from student as s, student_history as sh where s.discipline_id = '$discipline' and s.session_id = '$session' and
						   sh.semester_id = '$semester' and s.student_id = sh.student_id";
		$result_result = mysqli_query($connection,$student_result);
		$count = mysqli_num_rows($result_result);
		
		if($count == "") {
				echo '
					<script>
                        alert("No Record Found...");
                        location.replace("result_record.php");
                    </script>
				';
			}  
		}
?>