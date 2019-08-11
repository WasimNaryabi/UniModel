    <head>
               <?php 
         @session_start(); 
       include("models/database_connection.php");
       if($_SESSION['user_name'] == ""){
          header("location:secrecy_login.php?msg= login please With Correct userName And Password");
}
       ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

       <title>Secrecy Portal</title>
        <link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">
         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="secrecy_main.css">
        <link rel="stylesheet" href="input_type_styles.css">
        <link rel="stylesheet" href="fa.css">
    </head>