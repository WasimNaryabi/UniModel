
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
    
        $result_final_exam = $pdo->query("select c.course_id, course_name, c.credit_hours, sum(am.marks_obtained) as 'ass_marks', sum(am.total_marks) as 'ass_total',
                            sum(qm.obtained_marks) as 'quiz_marks', sum(qm.total) as 'quiz_total', mid.midterm_marks_obtained as 'mid_marks',
                            f.finalterm_marks_obtained as 'final_marks' from assignment_marks as am, quiz_marks as qm, midterm_result as mid, 
                            finalterm_result as f, courses as c where am.student_history_id = '$student_history_id' and am.course_id = c.course_id and 
                            qm.student_history_id='$student_history_id' and qm.course_id=c.course_id and mid.student_history_id = '$student_history_id'
                            and mid.course_id = c.course_id and f.student_history_id = '$student_history_id' and f.course_id = c.course_id and 
                            c.discipline_id = '$discipline_id' and c.semester_id = '$semester_id' group by c.course_id order by c.serial_no");
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
                                 
                                Final Result
                            </h2>
                        
                        </div>
        <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                             
                        <table class="table table-responsive table-hover table-stripped">
                           <tr bgcolor="#E4E4E4">
        <th width="95" height="50">Course No.</th>
        <th width="330">Subject</th>
        <th width="85">Mid-Exam Marks</th>
        <th width="95">Final-Exam Marks</th>
        <th width="100">Marks Obtained</th>
        <th width="100">Total Marks</th>
        <th width="60">% age</th>
        <th width="55">Grade</th>
        <th width="55">GPA</th>
    </tr>
      <?php
        $total_gpa = 0;
        $midexam_marks = 0;
        $finalexam_marks = 0;
        $total_marks = 0;
        $total_crhr = 0;
        $total_marks_obtained = 0;

        while($show = $result_final_exam->fetch(PDO::FETCH_ASSOC)) {

            $assignment_marks = $show['ass_marks'];
            $assignment_total_marks = $show['ass_total'];           
            $assignment_ratio = ($assignment_marks/$assignment_total_marks) * 10;
            
            $quiz_marks = $show['quiz_marks'];
            $quiz_total_marks = $show['quiz_total'];
            $quiz_ratio = ($quiz_marks/$quiz_total_marks) * 5;
            
            $mid_marks = $show['mid_marks'];
            $midexam_marks = $assignment_ratio + $quiz_ratio + $mid_marks;
            
            $final_marks = $show['final_marks'];
            $finalexam_marks = $midexam_marks + $final_marks;
            
            $subject_credit_hr = $show['credit_hours'];
            $percentage = (round($finalexam_marks)/100) * 100;

                if($percentage >= 90 && $percentage <= 100) {
                        $grade = '&nbsp; A+';
                        $gpa = number_format(4.00, 2);
                    }
                else if ($percentage >= 80 && $percentage <= 89) {
                        $grade = 'A';
                        $gpa = number_format(3.67, 2);
                    }
                else if ($percentage >= 70 && $percentage <= 79) {
                        $grade = '&nbsp; B+';
                        $gpa = number_format(3.33, 2);
                    }
                else if ($percentage >= 65 && $percentage <= 69) {
                        $grade = 'B';
                        $gpa = number_format(3.00, 2);
                    }
                else if ($percentage >= 56 && $percentage <= 64) {
                        $grade = '&nbsp; C+';
                        $gpa = number_format(2.50, 2);
                    }
                else if ($percentage >= 50 && $percentage <= 55) {
                        $grade = 'C';
                        $gpa = number_format(2.00, 2);
                    }
                else if ($percentage >= 40 && $percentage <= 49) {
                        $grade = 'D';
                        $gpa = number_format(1.30, 2);
                    }
                else if ($percentage >= 0 && $percentage <= 39) {
                        $grade = 'E';
                        $gpa = number_format(0.00, 2);
                    }                
?>

    <tr>
        <td><?php echo $show['course_id']; ?></td>
        <td align="left"> &emsp; &emsp; <?php echo $show['course_name']; ?></td>
        <td><?php echo round($midexam_marks); ?></td>
        <td><?php echo round($final_marks); ?></td>
        <td><?php echo round($finalexam_marks); ?></td>
        <td>100</td>
        <td><?php echo round($percentage)." %"; ?></td>
        <td><?php echo $grade; ?></td>
        <td><?php echo $gpa; ?></td>
    </tr>

<?php
        $total_marks_obtained = $total_marks_obtained + round($finalexam_marks);
        $total_marks = $total_marks + 100;
        $credit_hours = $show['credit_hours'];
        $total_crhr = $total_crhr + $credit_hours;
        $subject_gpa = ($gpa * $credit_hours);
        $total_gpa = $total_gpa + $subject_gpa;
    }
        
        $average_percentage = ($total_marks_obtained/$total_marks) * 100;
        $average_gpa = $total_gpa/$total_crhr;
        
        if($average_percentage >= 90 && $average_percentage <= 100) {
                        $average_grade = '&nbsp; A+';
                    }
                else if ($average_percentage >= 80 && $average_percentage <= 89) {
                        $average_grade = 'A';
                    }
                else if ($average_percentage >= 70 && $average_percentage <= 79) {
                        $average_grade = '&nbsp; B+';
                    }
                else if ($average_percentage >= 65 && $average_percentage <= 69) {
                        $average_grade = 'B';
                    }
                else if ($average_percentage >= 56 && $average_percentage <= 64) {
                        $average_grade = '&nbsp; C+';
                    }
                else if ($average_percentage >= 50 && $average_percentage <= 55) {
                        $average_grade = 'C';
                    }
                else if ($average_percentage >= 40 && $average_percentage <= 49) {
                        $average_grade = 'D';
                    }
                else if ($average_percentage >= 0 && $average_percentage <= 39) {
                        $average_grade = 'E';
                    }
?>

    <tr bgcolor="E7E7E7">
        <th>Total</th>
        <th></th>
        <th></th>
        <th></th>
        <th><?php echo $total_marks_obtained; ?></th>
        <th><?php echo $total_marks; ?></th>
        <th><?php echo round($average_percentage, 2)." %"; ?></th>
        <th><?php echo $average_grade; ?></th>
        <th><?php echo number_format($average_gpa, 2); ?></th>
    </tr>
                        </table>
                        </div>
        
    </div>          
        </div> 
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>