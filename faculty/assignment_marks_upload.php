<!DOCTYPE html>
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
                             <h2 class="text-center">Assignments Marks Details</h2>
                        
                </div>
                     <!-- Section Details start  -->
                <form action="models/assignments_marks_upload_backend.php" method="post">
                     <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            
                        
                             <table class="table table-responsive table-hover table-stripped">
                                 <tr>
                                     
                                   <th>Discipline</th>
                                   <td><?php echo $discipline_name; ?></td>
                                     
                                   <th>Session</th>
                                   <td><?php echo  $session_duration." (".$session_name.")"; ?></td>
                                 
                                 </tr>
                                  
                                 <tr>
                                     <th>Semester</th>
                                     <td><?php echo $semester_name; ?></td>

                                     <th>Section</th>
                                     <td><?php echo $section_name; ?></td>
                                     
                                 </tr>
                                 
                                
                             </table>

                         

                         
                        </div>
                     <!-- Section Details End -->
                <!-- Topic Details start  -->
                     <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">

                             <h2 class="text-center">Quiz Details</h2>
                             <table class="table table-responsive table-hover table-stripped">

                                 <tr>
                                   <!--  subject area start -->
                                   <td colspan="2"> 
                                   <div class="input-container">
  
                                             
                                            
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
                                   <!--  subject area end --> 
                                   <td>
                                       <div class="input-container">
                                         
                                         <input class="input-field" type="text" placeholder="Assignment Topic" name="topic">
                                       </div>
                                     </td>
                                   <td>
                                       <div class="input-container">
                                     
                                         <input class="input-field" type="number" placeholder="Assign No" name="assign_no">
                                       </div>
                                    </td>
                                     
                                   <td>
                                       <div class="input-container">
                                         
                                         <input class="input-field" type="number" placeholder="Assignments Total Marks" name="total_marks">
                                       </div>
                                     </td>
                                 
                                 </tr>
                                  
                         </table>
                       

                        </div>
                     <!-- Topic Details End -->
                    
                    <!-- section Attendance start -->
                    
                     <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Student assignment Marks sheet</h2>
                    
                        <table class="table table-responsive table-hover table-stripped" border="1">
                            <tr class="bg-info">
                                <th>S.No</th>
                                <th>Class#</th>
                                <th>Name</th>
                                <th>Assignment. Marks</th>

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
                            
                            <tr>
                                
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['roll_number']; ?></td>
                                <td><?php echo $name." &nbsp;".$gender." &nbsp;".$father_name; ?></td>
                              
                                <td algin="center"><input type="number" name="<?php echo $data['student_history_id']; ?>" id="marks" placeholder="00" minlength="1" maxlength="2" size="1"></td> 
                               
                            </tr>
                               <?php 
                               $i++;   
                             }
                            ?>
                             <!--end 1-->
                           
                                  <tr>
                                       <td colspan="7">
                                        <input type="submit" name="submit" class="btn" value="Submit">
                                    </td>
                                  </tr>
                          
                           
                        </table>
                         
                         
                         
                        </div>
                </form>
                    <!-- section Attendance end -->
                    
            </div> 
             
        </div> 
        
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>