<?php 
include("database_connection.php");
session_start();
if(isset($_POST['display'])){
		$discipline = $_POST['discipline'];
		$session = $_POST['session'];
		$semester = $_POST['semester'];
		
		$_SESSION['discipline'] = $discipline;
		$_SESSION['session'] = $session;
		$_SESSION['semester'] = $semester;
		
		$result_attendance = $pdo->prepare("select * from student as s, student_history as sh where s.discipline_id = '$discipline' and s.session_id = '$session' and
							   sh.semester_id = '$semester' and s.student_id = sh.student_id");
		 
		$result_attendance ->setFetchMode(PDO::FETCH_ASSOC);
        $result_attendance ->execute();
        $count  = $result_attendance ->fetch();
		
		if($count == "") {
				 echo '<script>
                        alert("No Record Found Please Select Correct Options/Data...");
                        location.replace("../attendence_record.php");
                    </script>';
			} 
			} 
?>
 