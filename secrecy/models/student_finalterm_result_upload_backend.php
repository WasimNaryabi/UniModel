<?php 
include("database_connection.php");
session_start();
/* SESSION CREATION. */

	$secrecy_id = $_SESSION['secrecy_id'];
	
	$discipline_id = $_SESSION['discipline_id'];
	$semester_id = $_SESSION['semester_id'];
	$session_id = $_SESSION['session_id'];
	$section_id = $_SESSION['section_id'];
	$subject_id = $_SESSION['course_id'];
/*echo $discipline_id." / ".$semester_id." / ".$session_id." / ".$section_id." / ".$subject_id;exit();*/
/* ======================================== Condition applied before entering to Admin - Home page ======================================== */

	if(!(isset($secrecy_id))) {
				header("location:secrecy_login.php");
		} else {

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */

			$query_select = $pdo->prepare("select * from secrecy where secrecy_id = '$secrecy_id';");
			$query_select->setFetchMode(PDO::FETCH_ASSOC);
			 $query_select->execute();
			 $row = $query_select->fetch();
			
/* ============================= Select Query for Retrival Discipline, Session, Semester, Section & Subject from Database ========================== */

		$query_display = $pdo->prepare("select * from courses as c, discipline as d, semester as s, session as ses, section as sec where c.course_id = '$subject_id'
						  and d.discipline_id = '$discipline_id' and s.semester_id = '$semester_id' and ses.session_id = '$session_id' and 
						  sec.section_id = '$section_id'");
		 
		$query_display->setFetchMode(PDO::FETCH_ASSOC);
			 $query_display->execute();
			 $display = $query_display->fetch();
		
		$discipline_name = $display['discipline_name'];
		$semester_name = $display['semester_name'];
		$session_duration = $display['session_duration'];
		$session_name = $display['session_name'];
		$section_name = $display['section_name'];
		$course_name = $display['course_name'];
		$course_id = $display['course_id'];
		
/* ================================ Select Query for Retrival of Student's Mid-Result Marks from Database =============================== */
		
	  $result_marks  = $pdo->query("select s.discipline_id, s.session_id, s.first_name, s.last_name, s.father_name, s.gender, s.roll_number, sh.student_history_id, 
	  				  am.total_marks, am.assignment_marks_id, am.marks_obtained, qm.obtained_marks, qm.total, sum(am.marks_obtained) as 'ass_marks', 
					  sum(am.total_marks) as 'ass_total', sum(qm.obtained_marks)/2 as 'quiz_marks', sum(qm.total)/2 as 'quiz_total', 
					  mid.midterm_marks_obtained as 'mid_marks', mid.midterm_total_marks as 'mid_total' from courses as c, assignment_marks as am, 
					  quiz_marks as qm, student as s, student_history as sh, midterm_result as mid, section as sec where am.course_id='$subject_id' and 
					  am.student_history_id = sh.student_history_id and qm.course_id = '$subject_id' and qm.student_history_id = sh.student_history_id 
					  and mid.student_history_id = sh.student_history_id and mid.course_id = '$subject_id' and sh.student_id = s.student_id and 
					  s.discipline_id = '$discipline_id' and s.session_id = '$session_id' and sh.semester_id = '$semester_id' and sec.section_id = 
					  '$section_id' and s.section_id = sec.section_id group by sh.student_history_id order by sh.student_id;");
	   
 
 
	  $i = 1;
		
/* ======================================== Final-Term Marks Submission Procedure ======================================== */
	
	if(isset($_POST['upload'])) {
		/*echo "testing";exit();*/
		$total_marks = $_POST['total_marks'];
		
		$result_show =$pdo->query("select * from student as s, session as ss, student_history as sh, section as sec where s.discipline_id = '$discipline_id' and
			   		   s.student_id = sh.student_id and s.session_id = '$session_id' and sec.section_id = '$section_id' and ss.session_id = s.session_id
					   and sh.semester_id = '$semester_id' and sec.section_id = s.section_id order by s.student_id");
		 
/* ======================================== Insertion Query ======================================== */
		
		while($show = $result_show->fetch(PDO::FETCH_ASSOC)) {
			
			$marks_obtained = $_POST[$show['student_history_id']];
			$std_history_id = $show['student_history_id'];

		$result_finalexam_marks = $pdo->query("insert into finalterm_result(student_history_id,course_id,finalterm_marks_obtained,finalterm_total_marks)
								   values('$std_history_id','$subject_id','$marks_obtained','$total_marks')");
		 

		}
 echo'
			<script>
                location.replace("../students_final_marks.php");
                alert("Students Final-Term Marks has been Uploaded...");
            </script>';
        }
 }
	
?>
 
