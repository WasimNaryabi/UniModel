
<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>
<?php include("models/database_connection.php");
 $student_id = $_SESSION['student_id'];
$select_student =  $pdo->prepare("SELECT * FROM student where student_id = '$student_id'");

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
              <div  class="col-md-12"style="color:white;background-color:#2c276c;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
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
                                 Student Personal Info
                            </h2>
                        <table class="table table-responsive table-hover table-stripped">
                           <?php 
                           $select_student->setFetchMode(PDO::FETCH_ASSOC);
                           $select_student->execute();
                           $store = $select_student->fetch();
                       $full_name = $store['first_name']." ".$store['last_name'];

                             ?>
                            <tr>
                                 
                                <th>Full Name</th>
                                <td><?php echo $full_name; ?></td>
                                <th>Father Name</th>
                                <td><?php echo $store['father_name'];?></td>
                                
                            </tr>
                            
                            <tr>
                                <th>Date Of Birth</th>
                                <td><?php echo $store['date_of_birth'];?></td>
                                <th>Place Of Birth</th>
                                <td><?php echo $store['city'];?></td>
                            </tr>
                            <tr>
                                <th>Mobile No</th>
                                <td><?php echo $store['mobile_number'];?></td>
                                <th>CNIC</th>
                                <td><?php echo $store['cnic'];?></td>
                            </tr>
                            
                            <tr>
                                <th></th>
                                 
                                <th>Address</th>
                                <td><?php echo $store['address'];?></td>
                                <td></td>
                            </tr>
                             
                        </table>
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