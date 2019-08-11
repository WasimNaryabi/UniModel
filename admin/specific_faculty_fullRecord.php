
<!DOCTYPE html>
<html>

<?php include("sliced/head.php");

/* SESSION CREATION. */

    $admin_id = $_SESSION['admin_id'];

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */

        $query_select = $pdo->prepare("select * from admin where admin_id = '$admin_id';");
        $query_select->setFetchMode(PDO::FETCH_ASSOC);
        $query_select->execute();
        $row =  $query_select->fetch();

/* ====================== SESSION Faculty created ====================== */

    $faculty_id = $_SESSION['faculty_id'];
    
    $query_specific_faculty = $pdo->prepare("select * from faculty where faculty_id = '$faculty_id';");
    $query_specific_faculty->setFetchMode(PDO::FETCH_ASSOC);
        $query_specific_faculty->execute();
        $show =  $query_specific_faculty->fetch();
     
    
    $name = $show['first_name']." ".$show['last_name'];;
    $father_name = $show['father_name'];
    $gender = $show['gender'];
    
    $birth_date = $show['date_of_birth'];
    $explode_date = explode("-", $birth_date);
    $date = $explode_date[2];
    $month = $explode_date[1];
    $year = $explode_date[0];
    $city = $show['city_name'];
    $country = $show['country'];
    $birth_date = $date."/".$month."/".$year;
 
    if($gender == "male" or $gender == "Male") {
            $sign = " S/O ";
        } else {
            $sign = " D/O ";
        }
    
    $full_name = $name.$sign.$father_name;
?>

<body>


<style type="text/css">
    td{
        color:#811b85;
    }
    .sub-fonts{
        color:blue;
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
                                 
                              Faculty Member Information
                            </h2>
                        </div>
         
      
        

                            <div class="row">
                                       <div class="col-md-2"></div> 
                                <div class="col-md-8" style="font-size: 20px;">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;border:2px solid #811b85;">
                            <h2 class="text-center" style="color:#811b85;">
                                 <?php echo $full_name; ?>
                                     
                                 </h2>
                   <!--  table is starting from here -->
                   <table  class="table table-bordered table-responsive  table-hover">
                <tr>
               
            </tr>
            
            <tr align="center" style="background-color:#811b85;">
                <td colspan="2"><img src="faculty images/<?php echo $show['picture_path']; ?>" height="180px" width="150px"/></td>
            </tr>
            
            <tr>
                <td width="130">Full Name:</td>
                <td width="450" class="sub-fonts"><?php echo $full_name; ?></td>
            </tr>
            
            <tr>
                <td>Date Of Birth:</td>
                <td class="sub-fonts"><?php echo $birth_date; ?></td>
            </tr>
            
            <tr>
                <td width="130">Place Of Birth:</td>
                <td class="sub-fonts"><?php echo $city; ?>, <?php echo $country; ?></td>
            </tr>
            
            <tr>
                <td>CNIC:</td>
                <td class="sub-fonts"><?php echo $show['cnic']; ?></td>
            </tr>
            
            <tr>
                <td>Mobile No.</td>
                <td class="sub-fonts"><?php echo $show['mobile_number']; ?></td>
            </tr>
            
            <tr>
                <td>Address:</td>
                <td class="sub-fonts"><?php echo $show['address']; ?></td>
            </tr>
        </table>
                   <!--  table is ending  here -->
             

             
                            

                        </div>
       
                            </div>
                            </div>
        
            
    </div> 
         <!-- end of row -->
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>