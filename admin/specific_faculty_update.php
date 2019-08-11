<!DOCTYPE html>
<html>

<?php include("sliced/head.php");
 
?>

<body>

<?php 
include("models/database_connection.php");

/* ======================================== Select query for Specific Faculty Member ======================================== */

	$key = $_GET['id'];

	$query_specific_user = $pdo->prepare("select * from faculty where faculty_id = '$key';");
	$query_specific_user->setFetchMode(PDO::FETCH_ASSOC);
	$query_specific_user->execute();
	$show = $query_specific_user->fetch();
	 
	
	$birth_date = $show['date_of_birth'];
	$city = $show['city_name'];
	$country = $show['country'];
	$full_name = $show['first_name']." ". $show['last_name'];

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
                                 
                               Faculty Member Personal Information Update
                            </h2>
                        </div>
        
         <div  class="col-md-12"style="color:black;background-color:white;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;font-weight: bold;">
                            <h2 class="text-center">
                                 
                               <?php echo $full_name; ?>
                            </h2>
                        <form  method="post" enctype="multipart/form-data" action="models/specific_faculty_update_backend.php">
        <table class="table table-bordered table-responsive">
            <tr>
            	<input type="hidden"  class="input-field" name="id" value="<?php echo $key; ?>" required />
              	<th colspan="5"></th>
            </tr>
            
            <tr>
                <td colspan="5" align="center">
                	<img src="faculty images/<?php echo $show['picture_path']; ?>" height="100px" width="100px"/>
                </td>
            </tr>
            
            <tr>
                <td width="115">First Name:</td>
                <td width="200" class="sub-fonts">
                	<input type="text" name="first_name" value="<?php echo $show['first_name']; ?>" required   class="input-field"/>
                </td>
                <td width="120">Last Name:</td>
                <td width="200" class="sub-fonts">
                	<input type="text" name="last_name" value="<?php echo $show['last_name']; ?>" required   class="input-field"/>
                </td>
            </tr>
            
            <tr>
                <td>Father Name:</td>
                <td class="sub-fonts">
                	<input type="text" name="father_name" value="<?php echo $show['father_name']; ?>" required  class="input-field"/>
                </td>
                <td>Gender:</td>
                <td class="sub-fonts">
                	<input type="text" name="gender" value="<?php echo $show['gender']; ?>" required  class="input-field" />
                </td>
            </tr>
            
            <tr>
            <td>Date Of Birth:</td>
            <td class="sub-fonts">
            	<input type="date" name="date_of_birth" value="<?php echo $birth_date; ?>" required  class="input-field"/>
            </td>
        	<td>Place Of Birth:</td>
            <td class="sub-fonts">
            	 <input type="text" name="city" value="<?php echo $city; ?>" class="input-field">
            </td>
        </tr>
        
        <tr>
            <td>Mobile No.</td>
            <td class="sub-fonts">
            	<input type="text" name="mobile" value="<?php echo $show['mobile_number']; ?>" required   class="input-field"/>
            </td>
        	<td>CNIC:</td>
            <td class="sub-fonts">
            	<input type="text" name="cnic" value="<?php echo $show['cnic']; ?>" required  class="input-field" />
            </td>
        </tr>
            
            <tr>
                <td>Address:</td>
                <td class="sub-fonts" colspan="3">
                	<textarea name="address"  class="input-field" required /><?php echo $show['address']; ?>
                		
                	</textarea></td>
            </tr>
            
            <tr>
            <td colspan="2">
                	
                <input type="reset" value="Cancel" class="btn-warning input-field" />
            </td>
            <td colspan="2">
                <input type="submit" name="update" value="Update Record" class="btn-success input-field " />
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