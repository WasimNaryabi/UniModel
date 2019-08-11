<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>
<?php

/* SESSION CREATION. */

     

/* ======================================== Display All Faculty Members ======================================== */

    $display_records = $pdo->query("select * from faculty");
     
    $i = 1;


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
                                 
                              FACULYT MEMBERS UPDATE RECORDS PANEL
                            </h2>
                        </div>
         
      
        

                            <div class="row">
                                        
                                <div class="col-md-12" style="font-size: 20px;">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;border:2px solid #811b85;">
                            <h2 class="text-center" style="color:#811b85;">
                                  
                                     ALL FACULTY MEMBERS
                                 </h2>
                   <!--  table is starting from here -->
                   <table class="table table-bordered table-responsive  table-hover"> 
            
             
                <th class="text-center">S. No.</th>
                <th class="text-center">Photo</th>
                <th class="text-center">Full Name</th>
                <th class="text-center">Update</th>
            </tr>
<?php
        while($show = $display_records->fetch(PDO::FETCH_ASSOC)) {
            
            $gender = $show['gender'];
?>            
            <tr align="center">
                <td width="30"><?php echo $i; ?></td>
                <td width="105"><img src="faculty imageS/<?php echo $show['picture_path']; ?>" width="100px" height="100px" /></td>
<?php
        if($gender == 'male') {
?>
                <td width="400"><?php echo $show['first_name']." ".$show['last_name']." S/o ".$show['father_name']; ?></td>
<?php           
            } else {
?>
                <td width="400"><?php echo $show['first_name']." ".$show['last_name']." D/o ".$show['father_name']; ?></td>
<?php
                }
?>
                <td width="180">
                    <a href="specific_faculty_update.php?id=<?php echo $show['faculty_id']; ?>" class=" btn btn-warning">Edit Record</a></td>
            </tr>

<?php
            $i = $i+1;
        }
?>            
        </table>
                   <!--  table is ending  here -->
             

             
                            

                        </div>
       
                            </div>
                            </div>
        
            
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>