
<!DOCTYPE html>
<html>

<?php include("sliced/head.php");

 ?>
<?php
/* SESSION CREATION. */

    $admin_id = $_SESSION['admin_id'];

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */

        $query_select =$pdo->prepare("select * from admin where admin_id = '$admin_id';");
        $query_select->setFetchMode(PDO::FETCH_ASSOC);
        $query_select->execute();
        $row  = $query_select->fetch();

/* ====================== SESSION Student created ====================== */

    $student_id = $_SESSION['student_id'];

    $query_student_history =$pdo->prepare("select max(student_history_id) as sh_id from student_history where student_id = '$student_id';");  
    $query_student_history->setFetchMode(PDO::FETCH_ASSOC);
    $query_student_history->execute();
    $show_st_id  = $query_student_history->fetch();
     
    
    $student_history_id = $show_st_id['sh_id']."<br />";
    
    $query_specific_student = $pdo->prepare("select * from student_history as sh, student as st, semester as s, session as ses, discipline as d where
                               st.student_id = sh.student_id and sh.student_history_id = '$student_history_id' and s.semester_id = sh.semester_id and
                               st.session_id = ses.session_id and d.discipline_id = st.discipline_id;");
    
    $query_specific_student->setFetchMode(PDO::FETCH_ASSOC);
    $query_specific_student->execute();
    $show  = $query_specific_student->fetch();
    
    $name = $show['first_name']." ".$show['last_name'];;
    $father_name = $show['father_name'];
    $gender = $show['gender'];
    
    $birth_date = $show['date_of_birth'];
    $explode_date = explode("-", $birth_date);
    $date = $explode_date[2];
    $month = $explode_date[1];
    $year = $explode_date[0];
    $city = $show['city'];

    $country = $show['country'];
    $birth_date = $date."-".$month."-".$year;
    
    if($gender == "Male" or $gender == "male") {
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
                                 
                              Specific  Student Searching Portal
                            </h2>
                        </div>
         
      
        

                            <div class="row">
                                        
                                <div class="col-md-12" style="font-size: 20px;">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;border:2px solid #811b85;">
                            <h2 class="text-center" style="color:#811b85;">
                                 <?php echo $full_name; ?>
                                     
                                 </h2>
                   <!--  table is starting from here -->
                   <table  class="table table-bordered table-responsive  table-hover">
                <tr>
                   
                </tr>
         <!-- php backend coding for student data gathering/taking from database -->
          
         <!-- php backend coding for student data gathering/taking from database ends -->
                <tr align="center">
                   <td width="135" rowspan="5"><img src="images/<?php echo $show['picture_path']; ?>" height="130px" width="130px"/></td>
                          
                </tr>
                
                <tr>   
                 
                    <td width="120">Discipline:</td>
                    <td width="320" class="sub-fonts"><font size="+0" color="blue"><?php echo $show['discipline_name']; ?></font></td>
                </tr>
                <tr>    
                    <td>Session:</td>
                    <td class="sub-fonts"><font size="+0" color="blue"><?php echo $show['session_duration']."[".$show['session_name']."]"; ?></font></td>
                </tr>
                <tr>    
                    <td>Semester:</td>
                    <td class="sub-fonts"><font size="+0" color="blue"><?php echo $show['semester_name']; ?></font></td>
                </tr>
                <tr>    
                    <td>Class No.</td>
                    <td class="sub-fonts"><font size="+0" color="blue"><?php echo $show['roll_number']; ?></font></td>
                </tr>
                
                <tr>
                    <td width="135">Full Name:</td>
                    <td class="sub-fonts" colspan="2"><?php echo $full_name; ?></td>
                </tr>
                
                <tr>
                    <td>Date Of Birth:</td>
                    <td class="sub-fonts" colspan="2"><?php echo $birth_date; ?></td>
                </tr>
                
                <tr>
                    <td width="135">Place Of Birth:</td>
                    <td class="sub-fonts" colspan="2">
                        <?php echo $city; ?> <?php echo $country; ?></td>
                </tr>
                
                <tr>
                    <td>CNIC:</td>
                    <td class="sub-fonts" colspan="2"><?php echo $show['cnic']; ?></td>
                </tr>
                
                <tr>
                    <td>Mobile No.</td>
                    <td class="sub-fonts" colspan="2"><?php echo $show['mobile_number']; ?></td>
                </tr>
                
                <tr>
                    <td>Address:</td>
                    <td class="sub-fonts" colspan="2"><?php echo $show['address']; ?></td>
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