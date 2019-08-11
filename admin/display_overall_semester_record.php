<!DOCTYPE html>
<html>
<?php include("sliced/head.php");
include("models/database_connection.php");
      include("models/display_overall_semester_records_backend.php");
?>

  
<?php 
    $discipline = $_SESSION['discipline'];
        $session = $_SESSION['session'];
        $semester = $_SESSION['semester'];

        $query = $pdo->prepare("SELECT * FROM discipline, semester, session WHERE discipline_id='$discipline' and semester_id='$semester' and session_id='$session'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query ->execute();
        $display  = $query ->fetch();
 
/* ================================== Select Query for Retrival of Specific Students Catagory from Database =============================== */
    
        $store_query= $pdo->query("SELECT * FROM student AS s, discipline AS d
            WHERE s.discipline_id = '$discipline' AND s.session_id = '$session' AND
             s.discipline_id = d.discipline_id  ORDER BY s.roll_number+0 ;");

 ?>
 


 
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
<?php include("sliced/navbar.php"); ?>
        <!-- Page Content  -->
         <div id="content">          
            <?php include("sliced/top_bar.php");?>
<!-- end of the top bar -->   
    <div class="container-fluid"> 
        
         <div  class="col-md-12"style="color:white;background-color:#811b85;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">
                                 
                                <b> Students List &ensp;-&ensp; Discipline: '<?php echo $display['discipline_code']; ?>' 
                                   &ensp; Session: '<?php echo $display['session_duration']; ?>'
                                   &ensp; Semester: '<?php echo $display['semester_name']; ?>'
                </b>
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-12">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;" class="text-center">
                           
                     <table class="table table-responsive table-bordered table-hover table-stripped">
                             <tr>
             
        </tr>
        
        <tr>
            <th width="35">#</th>
            <th width="65">Class #</th>
            <th width="300">Registration NO</th>
            
            <th width="300">Full Name</th>
            <th width="100">D.O.B</th>
            <th width="135">Contact No.</th>
            <th width="240">Address</th>
            <th width="75">Photo</th>
        </tr>
<?php

         $i = 1;
            /* ================================== Select Query for Retrival of Specific Students Catagory from Database =============================== */
            while($show = $store_query->fetch(PDO::FETCH_ASSOC)){
                
                $name = $show['first_name']." ".$show['last_name'];
                $father_name = $show['father_name'];
                $regNo=$show['uni_reg_number'];
                $date_of_birth = $show['date_of_birth'];
                $country = $show['country'];
                $city = $show['city'];
                $gender = $show['gender'];
                
               /* $dob = $date_of_birth;*/ 
                /*$dob = explode('-',$date_of_birth); 
                $date_of_birth = $dob[2]."-".$dob[1]."-".$dob[0];*/
                $dob = $date_of_birth;
                $curYear = date("Y");
                $age = $curYear - $dob[0]." years";
?>
        <tr align="center">
            <td width="35"><?php   echo $i;  ?></td>
            <td><?php echo $show['roll_number']; ?></td>
            <td><?php echo $regNo?></td>
            
            <td>
                <?php 
                        if($gender == 'Male' or $gender == 'male') {
                                echo $name." S/O ".$father_name;
                            } else {
                                echo $name." D/O ".$father_name;    
                                }
                ?>
            </td>
            
            <td width="100"><?php echo $date_of_birth; ?></td>
            
            <td width="135"><?php echo $show['mobile_number']; ?></td>
            <td width="240"><?php echo $show['address']; ?></td>
            <td width="75"><img src="images/<?php echo $show['picture_path']; ?>" width="75px" height="75px" /></td>
        </tr>

<?php
      $i = $i+1;
    }
?>            

                             
                        </table>

                        </div>
       
                            </div>
                            </div>
        
            
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>