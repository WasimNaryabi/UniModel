<?php
	
	error_reporting(0);
	
	include("db_connection.php");

	$countryId = $_GET['country_id'];
	
	$query = "select * from country as c, city as ci where c.country_id = ci.country_id and c.country_id = ".$countryId;
	$result = mysqli_query($connection,$query);
	$str="";
	
	$str='<option value="0">- Select City -</option>';
	
	while($row = mysqli_fetch_assoc($result)) {
		$str.="<option value=".$row['city_id'].">".$row['city_name']."</option>";
	}
	
	echo $str;
	
?>