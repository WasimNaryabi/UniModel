<?php 
session_start();

include("models/database_connection.php");
if($_SESSION['user'] == ""){
    header("location:student_login.php?msg= login please");
}
?>    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

         <title>IBMS Students Portal</title>
         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/16db9b0bbb.js"></script>
        <!-- Our Custom CSS -->
        <link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="student_main.css">
        <link rel="stylesheet" href="input_type_styles.css">
        <link rel="stylesheet" href="fa.css">
        
         
    </head>