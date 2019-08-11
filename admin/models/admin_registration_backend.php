<?php 
include("database_connection.php");
if (isset($_POST['register'])){
	/*echo "hello iam working";exit();*/
	    $first_name = $_POST['first_name'];	  
		$last_name = $_POST['last_name'];
		$father_name = $_POST['father_name'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['dob'];
		$city = $_POST['city'];
		$country = $_POST['country'];
		$cnic = $_POST['cnic'];
		$mobile_number = $_POST['mobile_no'];
		$address = $_POST['address'];

		$image = $_FILES['photo']['name'];
		$image_ext = strtolower(substr($image,strpos($image,'.')+1));
		$tmp_image = $_FILES['photo']['tmp_name'];
		$location = "../admin_images/";

		$user_name = $_POST['user_name'];
		$password =md5($_POST['password']);
		$confirmed_password = md5($_POST['confirm']);
		/*$encrypt_password = md5($confirmed_password);*/
		if($password  == $confirmed_password){
			 /* ============ Insertion Query ============================= */
	
		if($image_ext == 'jpg' or $image_ext == 'png' or $image_ext == 'jpeg') {
			  if(move_uploaded_file($tmp_image,$location.$image)){
					$query_insert = $pdo->query("INSERT INTO admin 
	 	VALUES('','$first_name','$last_name','$gender','$date_of_birth','$country','$city','$cnic','$mobile_number','$address','$user_name',
						 '$password','$image')");
						  if($query_insert){
						echo" 
						<script>
                   			 alert('New Admin Created Successfully');        
                   	    </script>";						 
					    header("location:../admin_registration.php");
					}else{
						echo "<script> 
						      alert('Query DoesNot Getting All Fields data')
						      </script>";
					}
			}
			} else {


				$warning_msg = "Invalid File Format! <br /> The file must be in jpg, jpeg or png <br /> format.";

			 ?>
					<script>
                    alert($warning_msg);
                    header("location:../admin_registration.php");
				
                </script>
			 <?php
			};

		}else{?>
			<script>
                    alert("Password Are Not Matching");
                    header("location:../admin_registration.php");
				
                </script>
			<?php
			 
		}

}



 ?>