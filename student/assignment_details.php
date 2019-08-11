<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>

<body>
<?php    
    include("models/database_connection.php");
  
    $id = $_SESSION['student_id'];
 
/* ======================================== Select Query for Retrival of specific User from Database ======================================== */
    
    $query_select = $pdo->prepare("select * from student as std, session as ses where std.student_id = '$id' and ses.session_id = std.session_id;");
     
     $query_select->setFetchMode(PDO::FETCH_ASSOC);
      $query_select->execute();             
    $row =  $query_select->fetch();
    
    $discipline_id = $row['discipline_id'];
    
/* ======================================== Select Query for Retrival of Student History from Database ======================================== */

        $query_student_history =$pdo->prepare("select max(student_history_id) as sh_id from student_history where student_id = '$id';");
         
         $query_student_history->setFetchMode(PDO::FETCH_ASSOC);
         $query_student_history->execute();             
        $row =  $query_student_history->fetch();
        
        $student_history_id = $row['sh_id'];
        
        $query_student_semester =$pdo->prepare("select * from student_history where student_history_id = '$student_history_id';");
         
        $query_student_semester->setFetchMode(PDO::FETCH_ASSOC);
        $query_student_semester->execute();             
        $row =  $query_student_semester->fetch();
        
        $semester_id = $row['semester_id'];

/* ================================== Query for Retrival of Student's  Overall - Attandance from Database ================================= */
    
       $result_assignments =$pdo->query("select c.course_id,course_name,sum(ass_m.marks_obtained) as 'marks_obtained',sum(ass_m.total_marks) as 'total_marks' from 
                            assignment_marks as ass_m,courses as c where ass_m.student_history_id='$student_history_id' and c.semester_id='$semester_id'
                            and ass_m.course_id = c.course_id and c.discipline_id = '$discipline_id' group by c.course_id order by c.serial_no");
        
        $i = 1;
?>


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
                                 
                                Student Overall Assignment Details
                            </h2>
                        
                        </div>
        <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            
                        <table class="table table-responsive table-hover table-stripped">
                            <tr>
                                <th>S.No</th>
                                <th>Course code</th>
                                <th>Title</th>
                                <th>Total Marks</th>
                                <th>Obtain Marks</th>
                                <th>Progress</th>
                             
                                <th>Details</th>
                            </tr>
                            
<?php
     $j = 0;  
    while($show = $result_assignments->fetch(PDO::FETCH_ASSOC)) {
            $course_id = $show['course_id'];
            $course_name = $show['course_name'];
            $marks_obtained = $show['marks_obtained'];
            $total_marks = $show['total_marks'];
            $percentage = ($marks_obtained/$total_marks) * 100;
            $ratio = ($marks_obtained/$total_marks) * 10;
        ?>
            
            <tr>                
                                
        <td><font color="#000000"><?php echo $i; ?></font></td>
        <td><?php echo $course_id; ?></td>
        <td><?php echo $course_name; ?></td>
        <td><?php echo $total_marks; ?></td>
         <td><?php echo $marks_obtained; ?></td>

         
        <td>
            <?php $zero = 100;
             if($percentage>=70) {echo '
            <div class="progress progress-bar progress-bar-striped   progress-bar-success  text-center" style="width:'.$percentage.'%;">   
              '.  round($percentage)."%".' 
            </div>
            ';}else if($percentage>=60 and $percentage < 70){echo '
            <div class="progress progress-bar progress-bar-striped   progress-bar-warning  text-center" style="width:'.$percentage.'%;">   
              '.  round($percentage)."%".' 
            </div>
            ';}
            else if($percentage==0){echo '
            <div class="progress progress-bar progress-bar-striped   progress-bar-danger  text-center" style="width:'.$zero.'%;">   
              '. "No Assignments".' 
            </div>
            ';}
            else if($percentage<=50 and $percentage < 60){echo '
            <div class="progress progress-bar progress-bar-striped   progress-bar-danger  text-center" style="width:'.$percentage.'%;">   
              '.  round($percentage)."%".' 
            </div>
            ';}
             

            ?>               
        </td>                      
         <td><a href="subject_assignments_details.php?subject_id=<?php echo $course_id;?>&subject_name=<?php echo $course_name;?>"><i class="fas fa-address-book"></i></a></td>
                             
                                 
                            </tr>
                             <?php $i++;}?> 
                             
                        </table>
                        </div>
        
    </div>          
        </div> 
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>