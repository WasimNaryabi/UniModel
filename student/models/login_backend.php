<?php 
include("database_connection.php");
session_start();
if(isset($_POST['login'])){
	 
 $userName =  $_POST['user_name'];
 $password  = $_POST['password'];



/////////////////////////////////////////////////////////////////////////////////////     
////////////////////Query For Accessing Student  table all data///////////////
$select =$pdo->prepare("SELECT * FROM student WHERE uni_reg_number = '$userName' and password = '$password' ");
 	 $select->setFetchMode(PDO::FETCH_ASSOC);
 	 $select->execute();
     $data = $select->fetch();
     $student_id = $data['student_id'];
     $session_id = $data['session_id'];
     $discipline_id = $data['discipline_id'];
      
/////////////////////////////////////////////////////////////////////////////////////     
////////////////////Query For Accessing Student_History table all data///////////////
     $student_history = $pdo->prepare("SELECT * FROM student_history WHERE student_id = '$student_id;'");
     $student_history->setFetchMode(PDO::FETCH_ASSOC);
     $student_history->execute();
     $student_history_store = $student_history->fetch();
     $student_history_id = $student_history_store['student_history_id'];
     $student_semester_id = $student_history_store['semester_id'];
     $student_id = $student_history_store['student_id'];
     $_SESSION['session_id'] = $session_id;
     $_SESSION['discipline_id'] = $discipline_id;

/////////////////////////////////////////////////////////////////////////////////////     
////////////////////Query For Accessing Course table all data///////////////

	$courses = $pdo->prepare("SELECT * FROM courses WHERE dicipline_id = '$discipline_id' and semester_id = '$student_semester_id'");
     $courses->setFetchMode(PDO::FETCH_ASSOC);
     $courses->execute();
     $courses_store = $courses->fetch();
     $courses_id = $courses_store['course_id'];
/////////////////////////////////////////////////////////////////////////////////////     
////////////////////////////////////////////////////////////////////////////////////
   
 
 
if($userName == $data['uni_reg_number'] and $password == $data['password']){
	 
		header("location:../general_overview.php");
		$_SESSION['user'] =  $data['uni_reg_number'];
		$_SESSION['password'] =  $data['password'];
		$_SESSION['dicipline_id'] = $dicipline_id;
		$_SESSION['session_id'] = $session_id;
		$_SESSION['history_id'] = $student_history_id;
		$_SESSION['courses_id'] = $courses_id;
		$_SESSION['semester_id'] = $student_semester_id;
          $_SESSION['student_id'] =$student_id;
}		
 else{
 	header("location:../student_login.php");
 }
 
}

 ?>