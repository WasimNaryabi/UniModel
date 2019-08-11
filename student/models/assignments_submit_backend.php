<?php 
session_start();
include('database_connection.php'); 
	 
	$id = $_SESSION['student_id'];

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */
	
	$query_select = $pdo->prepare("select * from student as std, session as ses where std.student_id = '$id' and ses.session_id = std.session_id;");
	 
	$query_select->setFetchMode(PDO::FETCH_ASSOC);
	$query_select->execute();
	$row = $query_select->fetch();
	$discipline = $row['discipline_id'];
	$session_id = $row['session_id'];
	
/* ======================================== Select Query for Retrival of Student History from Database ======================================== */

	$query_student_history = $pdo->prepare("select * from student_history where student_id = '$id' and semester_id in(select max(semester_id) from student_history 
							  where student_id = '$id');");
	$query_student_history->setFetchMode(PDO::FETCH_ASSOC);
	$query_student_history->execute();
	$row = $query_student_history->fetch();
	 
		
	$student_history_id = $row['student_history_id'];
	$semester = $row['semester_id'];
		
	$login_date = date("d/m/Y");

/* ======================================== Assignment Upload Procedure ======================================== */
 
	if(isset($_POST['upload'])) {
		 
		$assignment_number = $_POST['number'];
		$assignment_topic = $_POST['topic'];
		$date = $_POST['date'];
		$subject = $_POST['subject_name'];
		$discipline_id = $_SESSION['discipline_id'];
		$session_id = $_SESSION['session_id'];
 
		$submitted_date = $login_date;
		$assignment_path = time().$_FILES['assignment']['name'];

/*echo		$assignment_number." / ".$assignment_topic." / ".$subject." / ".$discipline_id." / ".$session_id." / ".$submitted_date."/".$assignment_path;
		exit();
		*/
/* ======================================== Insertion Query ======================================== */
		$extention = strtolower(substr($assignment_path,strpos($assignment_path,'.')+1));
		
		if($extention == "jpg" or $extention == "jpeg" or $extention == "png" or $extention == "dox/docx" or $extention == "doc" or $extention == "docx" or $extention == "ppt" or $extention == "pptx" or $extention == "ppt/pptx"  )  {
		
		$result_assignment =$pdo->query("insert into assignments(assignment_number,student_history_id,discipline_id,semester_id,session_id,course_id,
							  assignment_topic,submitted_date,assignment_path) values('$assignment_number','$student_history_id','$discipline_id',
							  '$semester','$session_id','$subject','$assignment_topic','$date','$assignment_path')");
		 
		move_uploaded_file($_FILES['assignment']['tmp_name'], "../../faculty/assignment_path/".$assignment_path);
		
		if($result_assignment) {

?>
				<script>
                    alert("Your Assignment has been successfully Uploaded...");
					location.replace("../assignment_submit.php");
                </script>
<?php
			}
		}else{

?>
		<script>
        	alert("Invalid file format. Your Assignment file must be in 'jpg', 'jpeg', 'doc/docx' or 'ppt/pptx' format.");
        	location.replace("../assignment_submit.php");
        </script>
<?php			
		}
	}
?>

<style>