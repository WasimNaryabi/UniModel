  <?php 
  include("database_connection.php");
  if(isset($_POST['register'])){

  	$first_name      = $_POST['first_name'];
  	$last_name       = $_POST['last_name'];
  	$father_name     = $_POST['father_name'];
  	$gender_name     = $_POST['gender'];
  	$d_o_b           = $_POST['date_of_birth'];
  	$country         = $_POST['country'];
  	$city            = $_POST['city'];
  	$cnic            = $_POST['cnic'];
  	$mobile_no       = $_POST['mobile_no'];
  	$address         = $_POST['address'];
  	$user_name       = $_POST['user_name'];
  	$password        = $_POST['password'];
  	$conform_password = $_POST['conform_password'];
  	if($password != $conform_password){
  		header("location:../faculty_registration.php?msg=Password Are Not Matching");
  	}
  	$image = $_FILES['image']['name'];
  	$temp_image = $_FILES['image']['tmp_name'];
  	$location = '../faculty images/';
  	$image_extenstion = strtolower(substr($image,strpos($image,'.')+1));

  	if($image_extenstion == 'png' or $image_extenstion == 'jpg' or $image_extenstion == 'jpeg'){ 

  		if (file_exists($location.$image)){
  			echo "THIS IMAGE   IS ALREADY EXIST";
  		}else if(move_uploaded_file($temp_image,$location.$image)){
  				
  			$query = $pdo->query("INSERT INTO faculty VALUES('','$first_name','$last_name','$father_name','$gender_name','$d_o_b','$city','$country','$cnic','$mobile_no','$address','$image','$user_name','$password')");

  			if($query){
  				 echo "inserted";exit;
  				header("location:../faculty_registration.php?msg=Faculty Member Registered");
  			}else{
  				echo "QUERY PROBLEM";
  			}
  		}
  	}//end of if statements
  }//end of isset statements


   ?>