<?php 
include("models/database_connection.php");
 
	$semester_id = $_GET['semester_id'];
	$descipline_id = $_GET['descipline'];
	
	$query1  =$pdo->query("select * from semester as s, courses as c where s.semester_id = c.semester_id and c.semester_id = '$semester_id' and  c.discipline_id = '$descipline_id';");
	 
	$str="";
	
	$str='<option value="0">- Select Subject -</option>';
	
	while($row = $query1->fetch(PDO::FETCH_ASSOC)) {
		$str.="<option value=".$row['course_id'].">".$row['course_name']."</option>";
	}
	
	echo $str;
	
?>