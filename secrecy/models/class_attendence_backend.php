<?php 
include("database_connection.php");
session_start();
if(isset($_POST['submit'])){

	$subject = $_POST['subject'];
	$topic = $_POST['topic'];
	$date = $_POST['date'];
	$day = $_POST['day'];

 
	/*$attendance_check = $_POST['attendance_check'];*/

	$discipline_id = $_SESSION['discipline_id'];
	$faculty_id = $_SESSION['faculty_id'];

    $session_id  = $_SESSION['session_id'] ;
    $semester_id  = $_SESSION['semester_id'];
    $section_id  = $_SESSION['section_id'];
    

  
			$currentdate = explode("-",$date);
			
			$date = $currentdate[0];
			$month = $currentdate[1];
			$year = $currentdate[2];

 
    $select = $pdo->query("select * from student as s, session as ss, section as sec, student_history as sh where s.discipline_id = '$discipline_id' and
					  s.student_id = sh.student_id and s.session_id = '$session_id' and ss.session_id = s.session_id and sec.section_id = '$section_id'
					  and s.section_id = sec.section_id and sh.semester_id = '$semester_id' and sh.semester_id order by s.student_id;");

    while ($student_attendance = $select->fetch(PDO::FETCH_ASSOC)) {
    	 
     
    	$att_status  = $_POST[$student_attendance['student_history_id']];
     
			$situation = "";
			
			if($att_status == "on") {
				$situation = "P";
			} else {
				$situation = "A";
				}
			 			
			//echo $show['student_history_id'].".....".$_POST[$row['student_history_id']]."<br />";
			//echo $show['student_history_id'].".....".$situation."<br />";
			
			$std_history_id = $student_attendance['student_history_id'];
			 
			 /*echo "fid = ". $faculty_id."<br> std_hid= ".$std_history_id."<br>subjct =".$subject."<br>topic =/".$topic."<br>/situation = ".$situation."<br>day = ".$day."<br>/ date = ".$date."<br>/month =".$month."<br>/year = ".$year;exit();*/

			$insert_attandance = $pdo->query("INSERT INTO attandance VALUES('','$faculty_id','$std_history_id','$subject','$topic','$situation','$day','$date','$month','$year')");
			if($insert_attandance){
				echo "query done";
			}else{
				echo "query faul";exit();
			}
    }

    ?>
<script>
                    location.replace("../class_attendance_search.php");
                    alert("Attandance of Students has Submitted...");
                </script>
<?php
}


 ?>