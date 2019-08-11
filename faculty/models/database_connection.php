<?php 

$host = "localhost";
$user = "root";
$pass = "";
$database = "portal";

$dsn = 'mysql:host='.$host.';dbname='.$database.'';
$pdo  = new PDO($dsn,$user,$pass);
/*$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
*/
 ?>

