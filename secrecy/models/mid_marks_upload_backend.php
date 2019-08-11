<?php 
include("database_connection.php");
session_start();

if(isset($_POST['submit'])){
	
	$total_marks ="20";

 
	/*$attendance_check = $_POST['attendance_check'];*/

	$discipline_id = $_SESSION['discipline_id'];
	$faculty_id = $_SESSION['faculty_id'];
    $session_id  = $_SESSION['session_id'] ;
    $semester_id  = $_SESSION['semester_id'];
    $section_id  = $_SESSION['section_id'];
    $subject_id  = $_SESSION['subject_id'];
    
    

   

 
    $select = $pdo->query("select * from student as s, session as ss, student_history as sh, section as sec where s.discipline_id = '$discipline_id' and
			   		   s.student_id = sh.student_id and s.session_id = '$session_id' and sec.section_id = '$section_id' and ss.session_id = s.session_id
					   and sh.semester_id = '$semester_id' and sec.section_id = s.section_id order by s.student_id");

    while ($student_attendance = $select->fetch(PDO::FETCH_ASSOC)) {
    	 
     
    	    $obtain_marks  = $_POST[$student_attendance['student_history_id']];
			
			$std_history_id = $student_attendance['student_history_id'];
			 
		

			$insert_mid_marks = $pdo->query("INSERT INTO midterm_result VALUES('','$faculty_id','$std_history_id','$subject_id','$obtain_marks','$total_marks')");
			/*$insert_mid_marks = $pdo->query("INSERT INTO quiz_marks VALUES('','23','23','c','2','ifelse','4','10')");*/
			if($insert_mid_marks){
				echo "done";}
				else{
					echo "error";exit();
				}
			 
    }

    ?>
			}
<script>
                    location.replace("../mid_marks_search.php");
                    alert("Mid Term Marks of Students has Submitted...");
                </script>
<?php
}


 ?>