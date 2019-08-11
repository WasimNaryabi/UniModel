<?php 
include("database_connection.php");
session_start();



$select_session_id  = $pdo->query("SELECT * FROM session ORDER BY session_id");

/*$dicipline_id = $pdo->query("SELECT * FROM courses ");*/

$semester_id  = $pdo->query("SELECT * FROM semester");

 /**/ 
 ?>