<!DOCTYPE html>
<html>
<?php include("models/display_result_record_backend.php"); ?>
<?php include("sliced/head.php");?>
<?php

    error_reporting(0);

    include("config/db_connection.php");

/* SESSION CREATION. */

    $admin_id = $_SESSION['admin_id'];

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */

        $query_select = "select * from admin where admin_id = '$admin_id';";
        $result_select = mysqli_query($connection,$query_select) or die(mysql_error());
        $row = mysqli_fetch_assoc($result_select);

/* SESSION CREATION. */
    
        $discipline = $_SESSION['discipline'];
        $session = $_SESSION['session'];
        $semester = $_SESSION['semester'];

        $query = "select * from discipline, semester, session where discipline_id='$discipline' and semester_id='$semester' and session_id='$session'";
        $result = mysqli_query($connection,$query) or die(mysql_error());
        $display = mysqli_fetch_assoc($result);

/* =================================== Select Query for Retrival of Attendance of Students from Database ============================= */

        $query_result = "SELECT s.roll_number as 'r_no', s.first_name as 'first_name', s.last_name as 'last_name', s.father_name as 'father_name', s.gender 
                         as 'gender', c.course_id as 'course_id', c.course_name as 'course_name', c.credit_hours, sum(am.marks_obtained) as 'ass_marks', 
                         sum(am.total_marks) as 'ass_total', sum(qm.obtained_marks) as 'quiz_marks', sum(qm.total) as 'quiz_total', mid.midterm_marks_obtained 
                         as 'mid_marks', f.finalterm_marks_obtained as 'final_marks' from student as s, student_history as sh, courses as c, assignment_marks 
                         as am, quiz_marks as qm, midterm_result as mid, finalterm_result as f where s.discipline_id = '$discipline' and s.session_id = '$session' 
                         and c.course_id = am.course_id and c.course_id = qm.course_id and c.course_id = mid.course_id and c.course_id = f.course_id and 
                         s.student_id = sh.student_id and sh.semester_id = '$semester' and sh.student_history_id = am.student_history_id and sh.student_history_id = 
                         qm.student_history_id and sh.student_history_id = mid.student_history_id and sh.student_history_id = f.student_history_id and 
                         c.semester_id = '$semester' and c.discipline_id = '$discipline' group by sh.student_history_id, am.course_id 
                         order by sh.student_id, c.serial_no";
        $student_result = mysqli_query($connection,$query_result) or die(mysql_error());

/* =================================== Duplicate Query for Retrival of Attendance of Students from Database ============================= */

        $query_subject_names = $query_result;
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
                                 
              Students Result List &ensp;&ensp; - &ensp;&ensp; Discipline : '<?php echo $display['discipline_code']; ?>' 
                 &ensp; , &ensp; Session : '<?php echo $display['session_duration']; ?>'
                &ensp; , &ensp; Semester : '<?php echo $display['semester_name']; ?>'
                
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-12">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;" class="text-center">
                           
                     <table class="table table-responsive table-bordered table-hover table-stripped">
                            <tr>
             
        </tr>
        
        <tr>
            <th width="40" rowspan="2">S.no.</th>
            <th width="46" rowspan="2">Class No.</th>
            <th width="400" rowspan="2">Name</th>
            <th width="550" colspan="<?php echo ($number_of_subjects * 2); ?>" id="subjects">Subjects</th>
            <th width="65">Overall Subject Marks</th>
            <th width="65" rowspan="2">Overall %age</th>
            <th width="65" rowspan="2">Overall Gpa</th>
        </tr>

        <tr>
<?php
                $temp = 1;
                    while($temp <= $number_of_subjects) {
                        $row_subject_names = mysqli_fetch_assoc($result_subject_names);
                        $total_marks = $total_marks + 100;
                        echo "<td colspan='2' width=".(600/$number_of_subjects)."px>".$row_subject_names['course_name']."</td>";
                    $temp++;
                }
?>
            <td align="center"><b><?php echo $total_marks; ?></b></td>
        </tr>
        
<?php
            while($show = mysqli_fetch_assoc($student_result)) {
                $gender = $show['gender'];
?>
        <tr align="center">
            <td><?php echo $i.".";?></td>
            <td><?php echo $show['r_no']; ?></td>
<?php
        if($gender == 'Male') {
?>
            <td align="left"><?php echo $show['first_name']." ".$show['last_name']." S/O ".$show['father_name']; ?></td>            
<?php
            } else {
?>
            <td align="left"><?php echo $show['first_name']." ".$show['last_name']." D/O ".$show['father_name']; ?></td>            
<?php
}
                $midexam_marks = 0;
                $finalexam_marks = 0;
                $total_marks_obtained = 0;
                $credit_hours = 0;
                $subject_gpa = 0;

                for($k = 1; $k <= $number_of_subjects; $k++) {

                    $assignment_marks = $show['ass_marks'];
                    $assignment_total_marks = $show['ass_total'];
                    $assignment_ratio = ($assignment_marks/$assignment_total_marks) * 5;
    
                    $quiz_marks = $show['quiz_marks'];
                    $quiz_total_marks = $show['quiz_total'];
                    $quiz_ratio = ($quiz_marks/$quiz_total_marks) * 5;
    
                    $mid_marks = $show['mid_marks'];
                    $midexam_marks = $assignment_ratio + $quiz_ratio + $mid_marks;
    
                    $final_marks = $show['final_marks'];
                    $finalexam_marks = $midexam_marks + $final_marks;
                    
                    $subject_credit_hr = $show['credit_hours'];
                    $credit_hours = $credit_hours + $subject_credit_hr;
                    
                    $total_marks_obtained = $total_marks_obtained + round($finalexam_marks);
                    $overall_percentage = ($total_marks_obtained/$total_marks) * 100;
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
                    
                    $total_gpa = $gpa * $subject_credit_hr;
                    $subject_gpa = $subject_gpa + $total_gpa;
                    $average_gpa = $subject_gpa / $credit_hours;
                    
                    if(round($finalexam_marks) < 50) {
                            echo "<td bgcolor='#DDD' width=".((550/$number_of_subjects)/2)."px>".round($finalexam_marks)."</td>";
                            echo "<td bgcolor='#DDD' width=".((550/$number_of_subjects)/2)."px>".$gpa."</td>";
                        } else {
                                    echo "<td width=".((550/$number_of_subjects)/2)."px>".round($finalexam_marks)."</td>";
                                    echo "<td width=".((550/$number_of_subjects)/2)."px>".$gpa."</td>";
                            }

                    if($k < $number_of_subjects) {
                        $show = mysqli_fetch_assoc($student_result);
                    }
                }
?>
<?php
            if(round($overall_percentage) < 50) {
?>
                <td bgcolor="#E7E7E7"><?php echo $total_marks_obtained; ?></td>
                <td bgcolor="#E7E7E7"><?php echo number_format($overall_percentage, 2)." %"; ?></td>
                <td bgcolor="#E7E7E7"><?php echo number_format($average_gpa, 2); ?></td>
<?php               
                } else {
?>
                    <td><?php echo $total_marks_obtained; ?></td>
                    <td><?php echo number_format($overall_percentage, 2)." %"; ?></td>
                    <td><?php echo number_format($average_gpa, 2); ?></td>
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