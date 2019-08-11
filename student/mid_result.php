
<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>

<body>
<?php
 
    include("models/database_connection.php");
    
     $id =  $_SESSION['student_id'];
 /*echo $id;*/
/* ======================================== Select Query for Retrival of specific User from Database ======================================== */
    
    $query_select = $pdo->prepare("select * from student as std, session as ses where std.student_id = '$id' and ses.session_id = std.session_id;");
    $query_select -> setFetchMode(PDO::FETCH_ASSOC);
    $query_select ->execute();            
    $row = $query_select -> fetch();
    
    $discipline_id = $row['discipline_id'];

   /* print_r($query_select);exit();*/
/* ======================================== Select Query for Retrival of Student History from Database ======================================== */

        $query_student_history = $pdo->prepare("select max(student_history_id) as sh_id from student_history where student_id = '$id';");
        
          $query_student_history -> setFetchMode(PDO::FETCH_ASSOC);
          $query_student_history ->execute();            
          $row = $query_student_history -> fetch();

        $student_history_id = $row['sh_id'];
        
        $query_student_semester = $pdo->prepare("select * from student_history where student_history_id = '$student_history_id';");
          $query_student_semester ->execute();            
          $row = $query_student_semester -> fetch();
        
        $semester_id = $row['semester_id'];

/*echo $semester_id;exit();*/
/* ======================================== Query for Retrival of Student's  Overall - Attandance from Database ===================================== */
    
        $result_mid_exam = $pdo->query("select c.course_id,course_name,sum(am.marks_obtained) as 'ass_marks',sum(am.total_marks) as 'ass_total',sum(qm.obtained_marks)
                          as 'quiz_marks',sum(qm.total) as 'quiz_total',mid.midterm_marks_obtained as 'mid_marks' from assignment_marks as am,quiz_marks
                          as qm, midterm_result as mid, courses as c where am.student_history_id = '$student_history_id' and am.course_id = c.course_id
                          and qm.student_history_id='$student_history_id' and qm.course_id=c.course_id and mid.student_history_id='$student_history_id' 
                          and mid.course_id = c.course_id and c.discipline_id = '$discipline_id' and c.semester_id = '$semester_id' group by c.course_id
                          order by c.serial_no");
        /*print_r($result_attandance);exit();*/
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
                                 
                                Mid Term Result
                            </h2>
                        
                        </div>
        <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            
                        <table class="table table-responsive table-hover table-stripped">
                           <tr bgcolor="#E4E4E4">
        <th width="55" height="50">S. No.</th>
        <th width="100" height="50">Course No.</th>
        <th width="380">Subject</th>
        <th width="70">Assig Marks</th>
        <th width="70">Quiz Marks</th>
        <th width="90">Mid-Exam Marks</th>
        <th width="110">Marks Obtained</th>
        <th width="115">Total Marks</th>
    </tr>

   <?php
        while($show = $result_mid_exam->fetch(PDO::FETCH_ASSOC)) {
            
            $assignment_marks = $show['ass_marks'];
            $assignment_total_marks = $show['ass_total'];           
            $assignment_ratio = ($assignment_marks/$assignment_total_marks) * 10;
            
            $quiz_marks = $show['quiz_marks'];
            $quiz_total_marks = $show['quiz_total'];
            $quiz_ratio = ($quiz_marks/$quiz_total_marks) * 5;
            
            $mid_marks = $show['mid_marks'];
            $marks_obtained = $assignment_ratio + $quiz_ratio + $mid_marks;
?>

    <tr>
        <td><font color="#000000"><?php echo $i; ?></font></td>
        <td><?php echo $show['course_id']; ?></td>
        <td><?php echo $show['course_name']; ?></td>
        <td><?php echo round($assignment_ratio); ?></td>
        <td><?php echo round($quiz_ratio, 2); ?></td>
        <td><?php echo $mid_marks; ?></td>
        <td><?php echo round($marks_obtained); ?></td>
        <td>30</td>
    </tr>

<?php
        $i = $i + 1;
    }
?>            

                             
        </table>
        </div>
        
    </div>          
        </div> 
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>