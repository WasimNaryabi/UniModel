<?php 
include("database_connection.php");
session_start();
if(isset($_POST['submit'])){

	$subject = $_POST['subject'];
	$topic = $_POST['topic'];
	$quiz_no = $_POST['quiz_no'];
	$total_marks = $_POST['total_marks'];

 
	/*$attendance_check = $_POST['attendance_check'];*/

	$discipline_id = $_SESSION['discipline_id'];
	$faculty_id = $_SESSION['faculty_id'];

    $session_id  = $_SESSION['session_id'] ;
    $semester_id  = $_SESSION['semester_id'];
    $section_id  = $_SESSION['section_id'];
    

   

 
    $select = $pdo->query("select * from student as s, session as ss, section as sec, student_history as sh where s.discipline_id = '$discipline_id' and
					  s.student_id = sh.student_id and s.session_id = '$session_id' and ss.session_id = s.session_id and sec.section_id = '$section_id'
					  and s.section_id = sec.section_id and sh.semester_id = '$semester_id' and sh.semester_id order by s.student_id;");

    while ($student_attendance = $select->fetch(PDO::FETCH_ASSOC)) {
    	 
     
    	$obtain_marks  = $_POST[$student_attendance['student_history_id']];
   
			 
			 			
			//echo $show['student_history_id'].".....".$_POST[$row['student_history_id']]."<br />";
			//echo $show['student_history_id'].".....".$situation."<br />";
			
			$std_history_id = $student_attendance['student_history_id'];
			 
			 /* echo "fid = ". $faculty_id."<br> std_hid= ".$std_history_id."<br>subjct =".$subject."<br>topic =/".$topic."<br>/obtain_marks = ".$obtain_marks."<br>total_marks = ".$total_marks;exit();*/

			$insert_mid_marks = $pdo->query("INSERT INTO quiz_marks VALUES('','$faculty_id','$std_history_id','$subject','$quiz_no','$topic','$obtain_marks','$total_marks')");
			/*$insert_mid_marks = $pdo->query("INSERT INTO quiz_marks VALUES('','23','23','c','2','ifelse','4','10')");*/
			 
    }

    ?>
<script>
                    location.replace("../quizs_marks_search.php");
                    alert("Attandance of Students has Submitted...");
                </script>
<?php
}


 ?>