<!DOCTYPE html>
<html>

<?php include("sliced/head.php");
 
?>

<body>

<?php 
include("models/database_connection.php");
 
 

/* SESSION Student created... */

	$student_id = $_SESSION['student_id'];

	$query_specific_user = $pdo->prepare("select * from student as s, section as sec where s.student_id = '$student_id' and s.section_id = sec.section_id;");
	$query_specific_user->setFetchMode(PDO::FETCH_ASSOC);
    $query_specific_user->execute();
    $show =  $query_specific_user->fetch();
	
	$birth_date = $show['date_of_birth'];

/* ====================== Display City and Country of Specific User ====================== */
	
	/*$city = $show['city_id'];
	
	$query_location = "select * from city where city_id = '$city'";
	$result_location = mysqli_query($connection,$query_location);
	$display_location = mysqli_fetch_assoc($result_location);
	
	$country_id = $display_location['country_id'];*/
	
/* ======================================== Select Query for Retrival of specific User from Database ======================================== */
	
	if(isset($_POST['search'])){
		/*echo $student_id;exit;*/

		$registration = $_POST['registration'];
		$class_no = $_POST['class_no'];
		$section = $_POST['section'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$father_name = $_POST['father_name'];
		$gender = $_POST['gender'];
		$date_of_birth = $_POST['date_of_birth'];
		$city_id = $_POST['city'];
		$mobile_number = $_POST['mobile'];
		$cnic = $_POST['cnic'];
		$address = $_POST['address'];

		/*echo $registration." / ".$class_no." / ".$section." / ".$first_name." / ".$last_name." / ".$father_name." / ".$gender." / ".$date_of_birth." / ".$mobile_number." / ".$cnic." / ".$address;exit();*/
		
		$update_student = $pdo->query("UPDATE student SET uni_reg_number = '$registration', roll_number = '$class_no', section_id = '$section', gender = '$gender', 
						  first_name = '$first_name', last_name = '$last_name', father_name = '$father_name', date_of_birth = '$date_of_birth', 
						  city = '$city_id', mobile_number = '$mobile_number', cnic = '$cnic', address = '$address' where student_id ='$student_id'");

		 if($update_student) {

?>
            <script>
                alert("Student Record Updated...");
                location.replace("specific_student_update.php");
            </script>
<?php
        }
    }
?>
	        
		 
				
 

<style type="text/css">
	.input-field{
		color:red;
	}
</style>
    <div class="wrapper">
        <!-- Sidebar  -->
<?php include("sliced/navbar.php"); ?>
        <!-- Page Content  -->
         <div id="content">          
            <?php include("sliced/top_bar.php");?>
<!-- end of the top bar -->   
    <div class="container"> 
    	 <div  class="col-md-12"style="color:white;background-color:#811b85;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">
                                 
                                Student  Record Update
                            </h2>
                        </div>
        
         <div  class="col-md-12"style="color:black;background-color:white;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;font-weight: bold;">
                            <h2 class="text-center">
                                 
                                Student Personal Information Update
                            </h2>
                        <form  method="post" enctype="multipart/form-data" action="specific_student_update.php">    
    
    <table class="table table-bordered table-responsive">
        
        
        <tr>
            <td rowspan="3">
            	<img src="images/<?php echo $show['picture_path']; ?>" height="130px" width="130px" />
            </td>
        </tr>
        
        <tr>
            <td width="120">Registration No.</td>
            <td width="205" class="sub-fonts" colspan="2">
            	<input type="text" name="registration" class="input-field" value="<?php echo $show['uni_reg_number']; ?>" required />
            </td>
       	</tr>
        <tr>	
            <td width="105">Class No.
            	<input type="text" name="class_no" class="input-field" value="<?php echo $show['roll_number']; ?>" required />
            </td>
            <td width="105" colspan="2">Section:
            	<select name="section" class="input-field" >
                	<option value="<?php echo $show['section_id']; ?>"><?php echo $show['section_name']; ?></option>
<?php
		$select_section = $pdo->query("select * from section");
		 
			
			while($show_section = $select_section->fetch(PDO::FETCH_ASSOC)) {
?>
					<option value="<?php echo $show_section['section_id']; ?>"><?php echo $show_section['section_name']; ?></option>
<?php
			}
?>
                </select>
            </td>
        </tr>
        
        <tr>
            <td width="120">First Name:</td>
            <td width="205" class="sub-fonts">
            	<input type="text" class="input-field" name="first_name" value="<?php echo $show['first_name']; ?>" required />
            </td>
       		<td width="105">Last Name:</td>
            <td width="210" class="sub-fonts">
            	<input type="text" class="input-field" name="last_name" value="<?php echo $show['last_name']; ?>" required />
            </td>
        </tr>
        
        <tr>
            <td>Father Name:</td>
            <td class="sub-fonts">
            	<input type="text" class="input-field" name="father_name" value="<?php echo $show['father_name']; ?>" required />
            </td>
       		<td>Gender:</td>
            <td class="sub-fonts">
            	<input type="text" class="input-field" name="gender" value="<?php echo $show['gender']; ?>" required />
            </td>
        </tr>
        
        <tr>
            <td>Date Of Birth:</td>
            <td>
            	<input type="text" class="input-field" name="date_of_birth" value="<?php echo $birth_date; ?>" required />
            </td>
        	<td>Place Of Birth:</td>
            <td>
            
            	<input type="text" class="input-field" name="city" value="<?php echo $show['city']; ?>" required />
             
            </td>
        </tr>
        
        <tr>
            <td>Mobile No.</td>
            <td >
            	<input type="text" class="input-field" name="mobile" value="<?php echo $show['mobile_number']; ?>" required />
            </td>
        	<td>CNIC:</td>
            <td>
            	<input type="text" name="cnic" class="input-field" value="<?php echo $show['cnic']; ?>" required />
            </td>
        </tr>
        <tr>
         
            <td>Address:</td>
            <td colspan="3">
            	<textarea class="input-field" name="address" rows="3" cols="50" required /><?php echo $show['address']; ?>
            		
            	</textarea>
            </td>
         </tr>
        
        <tr>
        	 <td colspan="2">
                	
                <input type="reset" value="Cancel" class="btn-warning input-field" />
            </td>
            <td colspan="2">
                <input type="submit" name="search" value="Save" class="btn-success input-field " />
            </td>
        
            
        </tr>
    </table>
</form>
                         
        
             
         <!-- end of row -->
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>