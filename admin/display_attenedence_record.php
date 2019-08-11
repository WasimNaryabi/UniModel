<?php  include("models/display_attendence_record_backend.php");?>
<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>
<?php

  error_reporting(0);

  include("config/db_connection.php");

/* SESSION CREATION. */

   
/* SESSION CREATION. */
  
    $discipline = $_SESSION['discipline'];
    $session = $_SESSION['session'];
    $semester = $_SESSION['semester'];

    $query = "select * from discipline, semester, session where discipline_id='$discipline' and semester_id='$semester' and session_id='$session'";
    $result = mysqli_query($connection,$query) or die(mysql_error());
    $display = mysqli_fetch_assoc($result);

/* =================================== Select Query for Retrival of Attendance of Students from Database ============================= */

    $query_attendance = "select s.roll_number as 'r_no', s.first_name as 'first_name', s.last_name as 'last_name', s.father_name as 'father_name', 
               s.gender as 'gender', c.course_id as 'course_id', c.course_name as 'course_name', sum(a.status) as 'present',count(status) 
               as 'total' from student as s, student_history as sh, courses as c, attandance as a where s.discipline_id='$discipline' and 
               s.session_id = '$session' and c.course_id = a.course_id and s.student_id = sh.student_id and sh.semester_id = '$semester'
               and sh.student_history_id = a.student_history_id and c.semester_id = '$semester' and c.discipline_id = '$discipline'
               group by sh.student_history_id, a.course_id order by sh.student_id, c.serial_no;";
    $result_attendance = mysqli_query($connection,$query_attendance) or die(mysql_error());
    

/* =================================== Duplicate Query for Retrival of Attendance of Students from Database ============================= */

    $query_subject_names = $query_attendance;
    $result_subject_names = mysqli_query($connection,$query_subject_names) or die(mysql_error());

/* =================================== Query for Retrival of Subjects from Database ============================= */  

    $query_count_subjects = "select * from courses where discipline_id = '$discipline' and semester_id = '$semester';";
    $result_count_subjects = mysqli_query($connection,$query_count_subjects) or die(mysql_error());
    $number_of_subjects = mysqli_num_rows($result_count_subjects);
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
    <div class="container-fluid"> 
        
         <div  class="col-md-12"style="color:white;background-color:#811b85;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">
                                 Students Attendence List &ensp;&ensp; - &ensp;&ensp; Discipline : '<?php echo $display['discipline_code'] ?>' 
                           , Session : '<?php echo $display['session_duration']; ?>'
                           , Semester : '<?php echo $display['semester_name']; ?>'
                               
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-12">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;" class="text-center">
                           
                     <table class="table table-responsive table-bordered table-hover table-stripped">
                             <tr>
             
        </tr>
        
        <tr>
            <th width="35" rowspan="2">S.no.</th>
            <th width="42" rowspan="2">Class No.</th>
            <th width="200" rowspan="2">Name</th>
            <th width="700" colspan="<?php echo ($number_of_subjects * 2); ?>" id="subjects">Subjects</th>
            <th width="60">Overall Classes</th>
            <th width="60" rowspan="2">Overall %age</th>
        </tr>
        
        <tr>
    
<?php
      $temp = 1;
      
      while($temp <= $number_of_subjects) {
          
          $row_subject_names = mysqli_fetch_assoc($result_subject_names);
          $total_classes = $total_classes + $row_subject_names['total'];
      
      echo "<td colspan='2' width=".(700/$number_of_subjects)."px>".$row_subject_names['course_name']." - [".$row_subject_names['total']."]</td>";
      $temp++;
      }
?>
          <td align="center"><?php echo $total_classes; ?></td>
      </tr>
    
<?php
        while($show = mysqli_fetch_assoc($result_attendance)) {
        $gender = $show['gender'];
?>
      <tr align="center">
          <td><?php echo $i.".";?></td>
          <td><?php echo $show['r_no']; ?></td>             
          <td align="left"><?php echo $show['first_name']." ".$show['last_name']; ?></td>
<?php
        $total_present = 0;
        $total_classes_taken = 0;
      
        for($k = 1; $k <= $number_of_subjects; $k++) {

          $present = $show['present'];
          $total_present = $total_present + $present;
          $total = $show['total'];
          $total_classes_taken = $total_classes_taken + $total;
          $percentage = ($present/$total) * 100;
        
          if(round($percentage) < 75) {
              echo "<td bgcolor='#DDD' width=".((700/$number_of_subjects)/2)."px>".$present."</td>";
              echo "<td bgcolor='#DDD' width=".((700/$number_of_subjects)/2)."px>".round($percentage)."%</td>";
            } else {
                  echo "<td width=".((700/$number_of_subjects)/2)."px>".$present."</td>";
                  echo "<td width=".((700/$number_of_subjects)/2)."px>".round($percentage)."%</td>";
              }
        
          if($k < $number_of_subjects) {
            
            $show = mysqli_fetch_assoc($result_attendance);
          }
        }

          $overall_percentage = ($total_present/$total_classes_taken) * 100;

          if(round($overall_percentage) < 75) {
?>
            <td bgcolor="#E7E7E7"><?php echo $total_present; ?></td>
                <td bgcolor="#E7E7E7"><?php echo number_format($overall_percentage, 1)." %"; ?></td>
<?php
          } else {
?>
            <td><?php echo $total_present; ?></td>
                <td><?php echo number_format($overall_percentage, 1)." %"; ?></td>
<?php
          }
?>
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