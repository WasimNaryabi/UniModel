<?php
	
	error_reporting(0);
	
	include("db_connection.php"); 

	$discipline = $_GET['discipline'];
	
	$query = "select * from student where discipline = '$discipline' ";
	$result = mysqli_query($connection,$query) or die(mysql_error());
	
	$str='<option value="0">- Session -</option>';
	
	while($row = mysqli_fetch_assoc($result)) {
	
		$str.="<option value=".$row['session'].">".$row['session']."</option>";
		
	}
	
	echo $str;
	
?>