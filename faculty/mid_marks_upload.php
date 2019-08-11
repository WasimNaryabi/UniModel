<?php
include("models/database_connection.php"); 
session_start();
if(isset($_POST['sub'])){
 $discipline_id = $_POST['degree'];
 $session_id  = $_POST['session'];
 $semester_id  = $_POST['semester'];
 $section_id  = $_POST['section'];
 $subject_id = $_POST['subject'];


 $_SESSION['discipline_id'] = $discipline_id;
 $_SESSION['session_id'] = $session_id;
 $_SESSION['semester_id'] = $semester_id;
 $_SESSION['section_id'] = $section_id;
 $_SESSION['subject_id'] = $subject_id;
  
 $select1 = $pdo->prepare("select * from courses as c, discipline as d, semester as s, session as ses, section as sec where c.course_id = '$subject_id'
                          and d.discipline_id = '$discipline_id' and s.semester_id = '$semester_id' and ses.session_id = '$session_id' and 
                          sec.section_id = '$section_id'");
$select1->setFetchMode(PDO::FETCH_ASSOC);
 $select1->execute();
 $data1 = $select1->fetch();
$discipline_name =  $data1['discipline_name'];
 $session_duration = $data1['session_duration']; 
 $semester_name = $data1['semester_name'];
 $session_name = $data1['session_name'];
$section_name = $data1['section_name'];
$cource_name = $data1['course_name'];



/* $select = $pdo->query("select * from student as s, session as ss, section as sec, student_history as sh where s.discipline_id = '$discipline_id' and
             s.student_id = sh.student_id and s.session_id = '$session_id' and ss.session_id = s.session_id and sec.section_id = '$section_id'
             and s.section_id = sec.section_id and sh.semester_id = '$semester_id' and sh.semester_id order by s.student_id;"); */

/////////////////////////////////mid term marks query///////////////////////////////
    
    
$select =$pdo->query("select s.discipline_id, s.session_id, s.first_name, s.last_name, s.father_name, s.gender, s.roll_number, sh.student_history_id,
						am.assignment_marks_id, am.marks_obtained, am.total_marks, qm.obtained_marks, qm.total, sum(am.marks_obtained) as 'ass_marks',
						sum(am.total_marks) as 'ass_total', sum(qm.obtained_marks)/2 as 'quiz_marks', sum(qm.total)/2 as 'quiz_total' from courses as c,
						assignment_marks as am, quiz_marks as qm, student as s,student_history as sh, section as sec where sec.section_id ='$section_id'
						and am.student_history_id = sh.student_history_id and am.course_id = '$subject_id' and qm.course_id = '$subject_id' and 
						qm.student_history_id = sh.student_history_id and sh.student_id = s.student_id and s.discipline_id = '$discipline_id' and 
						s.session_id = '$session_id' and s.section_id = sec.section_id group by sh.student_history_id order by sh.student_id");
/////////////////////////////////mid term marks query ends///////////////////////////////
    
    
    
    
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
                           <h2 class="text-center">Mid Term Details</h2>
                        </div>
                     <!-- Section Details start  -->
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
                                 <tr>
                                     <th>Subject Name</th>
                                      <td colspan="2"> 
                                   <?php echo $cource_name; ?>
                                      </td> 
                                  <td></td>
                                 </tr>
                                
                             </table>


                        </div>
                     <!-- Section Details End -->
                
            
                    <!-- section Attendance start -->
                    
                     <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Student Mid Marks sheet</h2>
                    <form action="models/mid_marks_upload_backend.php" method="post">
                        <table class="table table-responsive table-hover table-stripped" border="1">
                            <tr class="bg-info">
                                <th>S.No</th>
                                <th>Class#</th>
                                <th>Name</th>
                                <th>Assig. Marks</th>
                                <th>Quiz. Marks</th>
                                <th >Mid. Marks</th>
                                <th>Mid Total Marks</th>
                                 
                            </tr>
                             
                             <?php 
                                  $i=1;
                            
                            while($data = $select->fetch(PDO::FETCH_ASSOC)){ 
                                
                                
                                $assignment_marks = $data['ass_marks'];
                                $assignment_total_marks = $data['ass_total'];
                                $assignment_ratio = ($assignment_marks/$assignment_total_marks) * 5;

                                $quiz_marks = $data['quiz_marks'];
                                $quiz_total_marks = $data['quiz_total'];
                                $quiz_ratio = ($quiz_marks/$quiz_total_marks) * 5;
                                $obt_marks=0;

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
                                
                                <td align="center"><?php echo round($assignment_ratio); ?>/5</td>
                                <td align="center"><?php echo round($quiz_ratio); ?>/5</td>
                                
                                <td align="center" style="width:120px"><input type="number" name="<?php echo $data['student_history_id'] ?>" placeholder="00" style="width:40px;" ></td> 
                                
                                <td align="center">20</td>
                            </tr>
                            
                          
                               <?php 
                                $i++;
                             }
                            ?>
                             <!--end 1-->
                           
                                  <tr>
                                       <td colspan="7"><input type="submit" name="submit" class="btn" value="Submit"></td>
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