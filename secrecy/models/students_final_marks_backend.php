<?php 

include("database_connection.php");
 
/* ======================================== Condition applied before entering to Admin - Home page ======================================== */
 
	if((isset($_SESSION['secrecy_id']) == "")) {
				header("location:secrecy_login.php");
		} else {

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */
			$secrecy_id = $_SESSION['secrecy_id'];
			$query_select = $pdo->prepare("select * from secrecy where secrecy_id = '$secrecy_id';");
			 $query_select->setFetchMode(PDO::FETCH_ASSOC);
			 $query_select->execute();

			$row = $query_select->fetch();
 
/* ======================================== Searching Student(s) Specific Catagory from Database ======================================== */

	if(isset($_POST['search'])) {
		 
		$discipline_id = $_POST['discipline'];
		$session_id = $_POST['session'];
		$semester_id = $_POST['semester'];
		$section_id = $_POST['section'];
		$subject_id = $_POST['subject'];
		/*echo $discipline_id." / ".$session_id." / ".$semester_id." / ".$section_id." / ".$subject_id;exit();*/

		$_SESSION['discipline_id'] = $discipline_id;
		$_SESSION['semester_id'] = $semester_id;
		$_SESSION['session_id'] = $session_id;
		$_SESSION['section_id'] = $section_id;
		$_SESSION['course_id'] = $subject_id;

		$query_show = $pdo->prepare("select * from student as s, session as ss, student_history as sh, section as sec where s.discipline_id = '$discipline_id' and
					   s.student_id = sh.student_id and s.session_id = '$session_id' and sec.section_id = '$section_id' and ss.session_id = s.session_id
					   and sh.semester_id = '$semester_id' and sec.section_id = s.section_id order by s.student_id");
		$query_show->setFetchMode(PDO::FETCH_ASSOC);
		$query_show->execute();

		$count = $query_show->fetch();
		
		if($count) {
				 
		} else {
 
			echo '<script>
                alert("No Record Found...");
                location.replace("student_finalTerm_result.php");
            </script>';
 			
			}
	}
}
?>


 