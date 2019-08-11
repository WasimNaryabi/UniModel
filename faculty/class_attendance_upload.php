<?php
include("models/database_connection.php"); 
session_start();
if(isset($_POST['search'])){
 $discipline_id = $_POST['discipline'];
 $session_id  = $_POST['session'];
 $semester_id  = $_POST['semester'];
 $section_id  = $_POST['section'];


 $_SESSION['discipline_id'] = $discipline_id;
 $_SESSION['session_id'] = $session_id;
 $_SESSION['semester_id'] = $semester_id;
 $_SESSION['section_id'] = $section_id;
  
 $select1 = $pdo->prepare("select * from discipline as d, semester as s, session as ses, section as sec where d.discipline_id = '$discipline_id' and 
              s.semester_id = '$semester_id' and ses.session_id = '$session_id' and sec.section_id = '$section_id' ;");
$select1->setFetchMode(PDO::FETCH_ASSOC);
 $select1->execute();
 $data1 = $select1->fetch();
$discipline_name =  $data1['discipline_name'];
 $session_duration = $data1['session_duration']; 
 $semester_name = $data1['semester_name'];
 $session_name = $data1['session_name'];
$section_name = $data1['section_name'];



 $select = $pdo->query("select * from student as s, session as ss, section as sec, student_history as sh where s.discipline_id = '$discipline_id' and
             s.student_id = sh.student_id and s.session_id = '$session_id' and ss.session_id = s.session_id and sec.section_id = '$section_id'
             and s.section_id = sec.section_id and sh.semester_id = '$semester_id' and sh.semester_id order by s.student_id;"); 
}

 ?>


<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include("sliced/navbar.php"); ?>
        <!-- Page Content  -->
         <div id="content">          
            <?php include("sliced/top_bar.php");?>
<!-- end of the top bar -->   
                <div class="container">    
                    
                    <div  class="col-md-12"style="color:white;background-color:#0a4d2b;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                             <h2 class="text-center">Section Details</h2>
                        
                        </div>
                    <!-- Section Details start  -->
                     <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            
                             <table class="table table-responsive table-hover table-stripped" border="1">
                                 <tr>
                                     

                                   <th>Discipline</th>
                                    
                                   <td><?php echo $discipline_name; ?></td>
                                     
                                   <th>Session</th>
                                   <td><?php echo $session_duration; ?></td>
                                     
                                   <th>Semester</th>
                                   <td><?php echo $semester_name; ?></td>
                                     
                                   <th>Section</th>
                                   <td><?php echo $section_name; ?></td>
                                 
                                 </tr>
                                  <form action="models/class_attendence_backend.php" method="post"  style="max-width:500px;margin:auto">
                                 <tr>
                                 <td colspan="2"> 
                                   <div class="input-container">
  
                                            <i class="fa fa-user icon"></i>
                                            
                                            <select name="subject" class="input-field">
                              <?php 
                              $select2 = $pdo->query("SELECT * FROM courses WHERE discipline_id = '$discipline_id' AND semester_id = '$semester_id'");
                              while($store_subject = $select2->fetch(PDO::FETCH_ASSOC)){
                                 
                                             $subject_codes = $store_subject['course_id'];
                                              $subject_name = $store_subject['course_name'];
                                             ?>
                                                <option value="<?php echo $subject_codes; ?>">
                                                  <?php echo $subject_name; ?>
                                                </option>  
                                                 
                                                 
                                                 <?php }; ?>
                                                 <option selected="" hidden="">Select Subject</option>  
                                            </select>
                                           
                                          </div> 
                                  </td>
                                 <td colspan="2">
                                     <div class="input-container">
                                       <i class="fa fa-user icon"></i>
                                       <input class="input-field" type="text" placeholder="Today Topic" name="topic">
                                     </div>   
                                 </td>
                                 <td colspan="2">  
                                     <div class="input-container">
                                       <i class="fa fa-user icon"></i>
                                       <input class="input-field" type="text" value="<?php 
                                          $currentDate=date('d-m-y');
                                            echo $currentDate; 
                                            
                                        ?>" name="date" readonly>
                                     </div> 
                                 </td>

                                 <td colspan="2">  
                                     <div class="input-container">
                                       <i class="fa fa-user icon"></i>
                                       <input class="input-field" type="text" value="<?php echo date("l"); ?>" name="day" readonly>
                                     </div> 
                                 </td>
                                 
                                 
                                 </tr>
                                
                             </table>


                        </div>
                     <!-- Section Details End -->
                    
                    <!-- section Attendance start -->
                    
                     <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Student Attendance Sheet</h2>
                    
                        <table class="table table-responsive table-hover table-stripped" border="1">
                          
                            
                            <tr>
                                
                                <th>S.No</th>
                                <th>Class No</th>
                                <th>Student Name</th>
                                <th>Status</th>             
                            </tr>
                                <?php $i=1;while($data = $select->fetch(PDO::FETCH_ASSOC)){ 
                              $name = $data['first_name']." ".$data['last_name'];
                              $father_name = $data['father_name'];
                              $gender =  $data['gender'];
                              if($gender == 'Male'){
                                $gender = "&nbsp; S/O &nbsp;";
                              }else{
                                $gender = "&nbsp; D/O &nbsp;";
                              }
                            ?>

                            <tr class="bg-info">

                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['roll_number']; ?></td>
                                <td><?php echo $name." &nbsp;".$gender." &nbsp;".$father_name; ?></td>
                                <td align="center">

                                  <input type="checkbox" name="<?php echo $data['student_history_id']; ?>" id="attendenc_check" checked style="width: 20px; height: 20px;" >

                                </td>
                                 
                            </tr>
                             
                            <?php $i++;}   ?>
                             <!--end 1-->
                           
                                  <tr>
                                       <td colspan="4">
                                        <input type="submit" name="submit" class="btn" value="Submit">
                                  </tr>
                          
                           
                        </table>
                         </form>
                        </div>
        
                    <!-- section Attendance end -->
                    
                    
                </div>
    
         </div>          
    </div> 
    

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>