

<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>
<?php 
include("models/database_connection.php");
/* SESSION CREATION. */

    $admin_id = $_SESSION['admin_id'];

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */

            $query_select = $pdo->prepare("select * from admin where admin_id = '$admin_id';");
            $query_select->setFetchMode(PDO::FETCH_ASSOC);
            $query_select->execute();
            $row = $query_select->fetch();

/* ======================================== Profile Update Procedure ======================================== */

    if(isset($_POST['update'])){
        
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $date_of_birth = $_POST['dob'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $cnic = $_POST['cnic'];
        $mobile_number = $_POST['mobile_number'];
        $address = $_POST['address'];
        /*echo $first_name." / ".$last_name." / ".$gender." / ".$date_of_birth." / ".$country." / ".$city." / ".$cnic." / ".$mobile_number." / ".$address;exit();*/
        
        $query_update =$pdo->query("UPDATE admin set first_name = '$first_name', last_name = '$last_name', gender='$gender', date_of_birth = '$date_of_birth',
                          address = '$address', mobile_number = '$mobile_number', city='$city',country = '$country', cnic = '$cnic' where admin_id = '$admin_id'");
         
        
        if($query_update) {
 
            echo '<script>
                alert("Profile Updated...");
                location.replace("profile.php");
            </script>';
 
        }
    }       
?>


<body>
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
                                 
                                Your Personal Profile
                            </h2>
                        
                        </div>
                    <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <?php /*include("sliced/top_image.php");*/ ?>
                        <div  class="col-md-12"style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-right:10px;">
                            <h2 class="text-center">
                                 You Can Edit / Update Your Information Here! Be Carefully
                            </h2>
                            <form action="profile.php" method="post">
                        <table class="table table-responsive table-hover table-stripped">
                            <tr>
                                 
                                <th>First Name</th>
                                <td><input type="text"  name="first_name" value="<?php echo $row['first_name'];?>">
                                </td>
                                <th>Last Name</th>
                                <td><input type="text"  name="last_name" value="<?php echo $row['last_name'];?>">
                                </td>    
                            </tr>
                             <tr>
                                 
                                <th>Date Of Birth</th>
                                <td><input type="date"  name="dob" value="<?php echo $row['date_of_birth'];?>">
                                </td>
                                <th>Gender</th>
                                <td><input type="text"  name="gender" value="<?php echo $row['gender'];?>">
                                </td>    
                            </tr>
                              <tr>
                                 
                                <th>Mobile Number</th>
                                <td><input type="text"  name="mobile_number" value="<?php echo $row['mobile_number'];?>">
                                </td>
                                <th>CNIC</th>
                                <td><input type="text"  name="cnic" value="<?php echo $row['cnic'];?>">
                                </td>    
                            </tr>
                             
                            
                            <tr>
                                 
                                <th>Birth City</th>
                                <td><input type="text"  name="city" value="<?php echo $row['city'];?>">
                                </td>
                                <th>Country</th>
                                <td><input type="text"  name="country" value="<?php echo $row['country'];?>">
                                </td>    
                            </tr>

                            <tr>
                                 
                                <th>Address</th>
                                <td colspan="3"><input type="text"  name="address" value="<?php echo $row['address'];?>">
                                </td>
                                    
                            </tr>
                            <tr>
                                 
                                  
                                <td colspan="4">
                                    <input class="btn btn-warning" type="submit"  name="update" value="Update Profile">
                                </td>
                                    
                            </tr>
                             
                        </table>
                    </form>
                        </div>
                        
                    </div>  
                     
                </div>
            </div>
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>