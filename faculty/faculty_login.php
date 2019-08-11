
<!DOCTYPE html>
<html>
<head>
	<title>Faculty Login</title>
	<link rel="stylesheet" type="text/css" href="student_login_style.css">
	 <link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">
</head>
<body>
    
<form class="box" action="models/faculty_login_backend.php" method="post">
     <div >
      <img src="../images/logo1.png" width="100%" style="border-radius:22px" class="img-responsive img-thumbnail">
     </div>
	<h1 style="border:2px solid green; padding: 5px;border-radius: 40px; font-family: serif;">Faculty Login</h1>

    <!-- username -->
	<input type="text" name="user_name" placeholder="Enter Username">
<!-- password -->
	<input type="Password" name="password" placeholder="Type Correct Password">
	<input type="submit" name="login"  value="Login">		

</form>
</body>
</html>