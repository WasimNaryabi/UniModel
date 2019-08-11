<?php 
include("database_connection.php");
if(isset($_POST['reg'])){
 
	$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$father_name = $_POST['father_name'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['dob'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$cnic = $_POST['cnic'];
		$mobile_number = $_POST['mobile'];
		$address = $_POST['address'];
		$image = $_FILES['photo']['name'];

		$image_ext = strtolower(substr($image,strpos($image,'.')+1));
		$tmp_image = $_FILES['photo']['tmp_name'];
		$location = "../images/";
		$discipline = $_POST['discipline'];
		$session = $_POST['session'];
		$section = $_POST['section'];
		$roll_number = $_POST['roll_number'];
		$password = $_POST['password'];
		$uni_regno = $_POST['uni_regno'];

		/* ======================================== Select Query for the Verification of Student Records ======================================== */		
		
		$select_query = $pdo->prepare("select * from student where discipline_id = '$discipline' and session_id = '$session' and section_id = '$section' and 
						 roll_number = '$roll_number'");
		$select_query->setFetchMode(PDO::FETCH_ASSOC);
		$select_query->execute();
		$select_query_store = $select_query->fetch();

		 
		 
		if($select_query_store) {
 
			echo '<script>
				alert("WARNING! The Student is already Registered.");
				location.replace("../student_registraion.php");
				 
			</script>';
 			
			}
/* ======================================== Insertion Query ======================================== */
	
		if($image_ext == 'jpg' or $image_ext == 'png' or $image_ext == 'jpeg') {
			 
			   move_uploaded_file($tmp_image,$location.$image);
					$query_insert = $pdo->query("INSERT INTO student 
	 	VALUES('','$first_name','$last_name','$father_name',
		'$gender','$date_of_birth','$country','$city','$cnic','$mobile_number','$address',
		'$image','$session','$discipline','$section',
		'$roll_number','$password','$uni_regno');");
					 
			 
			} else {
 			echo '
					<script>
                    alert("Invalid File Format! <br /> The file must be in jpg, jpeg or png <br /> format.");
                    location.replace("../student_registraion.php");
				
                </script>';

			 
				


			  
			}

	 
	    
	    

/* ======================================== Query for Maximum Student_id ======================================== */
		
		$query_max = $pdo->query("select max(student_id) as max_id from student;");
		$query_max->setFetchMode(PDO::FETCH_ASSOC);
		$query_max->execute();
		$result_max = $query_max->fetch();
		 
		/*$row_max = mysqli_fetch_assoc($result_max);*/
		
		$max_id = $result_max['max_id'];


/* ======================================== Insertion Query for Student Semester ======================================== */

		$insert_student_history = $pdo->query("insert into student_history(student_id,semester_id) values('$max_id',1)");
		
			if($insert_student_history) {
?>
				<script>
                    alert("Student has been successfully Registered...");
                   location.replace("../student_registraion.php");
				
                </script>
<?php			
				}
			 
		}


 ?>