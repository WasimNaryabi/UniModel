<?php
    include("models/database_connection.php");
    session_start();

/* SESSION CREATION. */

    $secrecy_id = $_SESSION['secrecy_id'];
    
    $discipline = $_SESSION['discipline'];
    $session = $_SESSION['session'];
    $semester = $_SESSION['semester'];

/* ======================================== Condition applied before entering to Secrecy - Home page ======================================== */

    if(!(isset($secrecy_id))) {
                header("location:secrecy_login.php");
        } else {

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */

            $query_select = $pdo->prepare("select * from secrecy where secrecy_id = '$secrecy_id';");
              $query_select -> setFetchMode(PDO::FETCH_ASSOC);
               $query_select ->execute();
            $row =  $query_select->fetch();
        
/* ====================================== Select Query for Retrival of Session Details from Database ==================================== */

        $query_session = $pdo->prepare("select * from session where session_id = '$session'");
        $query_session -> setFetchMode(PDO::FETCH_ASSOC);
        $query_session ->execute();
        $view=  $query_session->fetch();
        
        $session_duration = $view['session_duration'];
        $session_name = $view['session_name'];
        $session_id = $view['session_id'];

        $result = $pdo->query("select * from student as s, discipline as d, semester as sem where s.discipline_id = '$discipline' and s.session_id = '$session' and
                  d.discipline_id = '$discipline' and sem.semester_id = '$semester'");
          
}
?>



<html>
    <head>
        <title>Overall Student Transcripts</title>
    </head>

<style>
    
.dmc_table {
                //border:1px solid #CCC;
                font-weight:bold;
                margin-top:10px;
    }

.dmc_table tr th {
                    font-weight:bold;
                    font-size:20px;
                    text-align:center;
    }

.subject_table {
                    text-align:center;
                    font-weight:bold;
    }

.subject_table th {
                     font-weight:bold;
                     font-size:18px;
    }

</style>

<body>

<div class="main-div">
    <div class="panel_div">

<?php
        while($display = $result->fetch(PDO::FETCH_ASSOC)) {

                $student_id = $display['student_id'];
                $name = $display['first_name']." ".$display['last_name'];
                $father_name = $display['father_name'];
                $gender = $display['gender'];
                
                $discipline_name = $display['discipline_name'];
                $semester_name = $display['semester_name'];
                $registration = $display['uni_reg_number'];
                $roll_number = $display['roll_number'];
                $session = $display['session_id'];
                
?>
    <table width="900" border="0" align="center" cellpadding="7px" cellspacing="0px" class="dmc_table">
        <tr>
            <td width="155">&nbsp;</td>
            <th><img src="Images/aup_logo2.jpg" width="130" height="120" /></th>
            <td>&nbsp;</td>
        </tr>
        
        <tr>
            <td>&nbsp;</td>
            <th>THE UNIVERSITY OF AGRICULTURE, PESHAWAR</th>
            <td>&nbsp;</td>
        </tr>
        
        <tr>
            <td>&nbsp;</td>
            <th style="font-family:Verdana, Geneva, sans-serif; font-size:17px;">OFFICIAL TRANSCRIPT OF RECORD</th>
            <td>&nbsp;</td>
        </tr>
    
        <tr>
            <td>&nbsp;</td>
            <th><u>Bachelor of Science in <?php echo $discipline_name; ?></u></th>
            <td>&nbsp;</td>
        </tr>
        
        <tr>
            <td>Name and Parentage :</td>   
            <td>
<?php
                echo $name;
                
                    if($gender == 'male'){
                                echo " &nbsp; S/O &nbsp; ";
                            } else {
                                        echo " &nbsp; D/O &nbsp; ";
                                }
                echo $father_name;
?>
            </td>
            <td>Session : <?php echo $session_duration; ?></td>
        </tr>
        
        <tr>
            <td>C. No : 
<?php
                        if($roll_number <= 99) {
                                    echo "0".$roll_number;
                            } else {
                                    echo $roll_number;
                                }
?>
            </td>
            <td>Univ. Reg No : <?php echo $registration; ?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">
                <table border="0" cellpadding="5px" cellspacing="0px" class="subject_table" style="border-bottom:2px solid #000; font-size:18px;">
                    <tr>
                        <td width="100" align="left">Course No.</th>
                        <td width="360">Course Title</th>
                        <td width="80">Credit Hours</th>
                        <td width="120">Marks Obtained</th>
                        <td width="95">GP</th>
                        <td width="95" align="right">Grade</th>
                    </tr>
                </table>
                
                <table border="0" cellpadding="5px" cellspacing="0px" class="subject_table">
                    <tr>
                        <td align="left" colspan="6" style="font-family:Arial, Helvetica, sans-serif; font-size:18px;">
                            <u><?php echo $semester_name." Semester"; ?></u>
                        </td>
                    </tr>
<?php

/* =================================== Select Query for Retrival of Students Result from Database ============================= */

        $student_result =$pdo->query("select s.student_id as student_id, c.course_id as 'course_id', c.course_name as 'course_name', c.credit_hours,
                         sum(am.marks_obtained) as 'ass_marks', sum(am.total_marks) as 'ass_total', sum(qm.obtained_marks) as 'quiz_marks',
                         sum(qm.total) as 'quiz_total', mid.midterm_marks_obtained as 'mid_marks', f.finalterm_marks_obtained as 'final_marks' from
                         student as s, student_history as sh, courses as c, assignment_marks as am, quiz_marks as qm, midterm_result as mid,
                         finalterm_result as f where s.discipline_id = '$discipline' and s.session_id = '$session_id' and c.course_id = am.course_id and
                         c.course_id = qm.course_id and c.course_id = mid.course_id and c.course_id = f.course_id and sh.student_id = '$student_id'
                         and sh.semester_id = '$semester' and sh.student_history_id = am.student_history_id and sh.student_history_id = 
                         qm.student_history_id and sh.student_history_id = mid.student_history_id and sh.student_history_id = f.student_history_id
                         and c.semester_id = '$semester' and c.discipline_id = '$discipline' group by sh.student_history_id, am.course_id 
                         order by sh.student_id, c.serial_no");
        
        
            $total_marks_obtained = 0;
            $finalexam_marks = 0;
            $midexam_marks = 0;
            $credit_hours = 0;
            $total_marks = 0;
            $subject_gpa = 0;
            $total_crhr = 0;
            $total_gpa = 0;

            
            while($show = $student_result->fetch(PDO::FETCH_ASSOC)) {
                
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
                
                $percentage = (round($finalexam_marks)/100) * 100;
                $subject_credit_hr = $show['credit_hours'];
        
                    if($percentage >= 90 && $percentage <= 100) {
                            $grade = ' &ensp; &ensp; &nbsp; A+';
                            $gpa = number_format(4.00, 2);
                        }
                    else if ($percentage >= 80 && $percentage <= 89) {
                            $grade = ' &ensp; &ensp; A';
                            $gpa = number_format(3.67, 2);
                        }
                    else if ($percentage >= 70 && $percentage <= 79) {
                            $grade = ' &ensp; &ensp; &nbsp; B+';
                            $gpa = number_format(3.33, 2);
                        }
                    else if ($percentage >= 65 && $percentage <= 69) {
                            $grade = ' &ensp; &ensp; B';
                            $gpa = number_format(3.00, 2);
                        }
                    else if ($percentage >= 56 && $percentage <= 64) {
                            $grade = ' &ensp; &ensp; &nbsp; C+';
                            $gpa = number_format(2.50, 2);
                        }
                    else if ($percentage >= 50 && $percentage <= 55) {
                            $grade = ' &ensp; &ensp; C';
                            $gpa = number_format(2.00, 2);
                        }
                    else if ($percentage >= 40 && $percentage <= 49) {
                            $grade = ' &ensp; &ensp; D';
                            $gpa = number_format(1.30, 2);
                        }
                    else if ($percentage >= 0 && $percentage <= 39) {
                            $grade = ' &ensp; &ensp; E';
                            $gpa = number_format(0.00, 2);
                        }
                        
                    $total_marks_obtained = $total_marks_obtained + round($finalexam_marks);
                    $total_marks = $total_marks + 100;
                    $total_crhr = $total_crhr + $subject_credit_hr;
                    $subject_gpa = ($gpa * $subject_credit_hr);
                    $total_gpa = $total_gpa + $subject_gpa;
?>
                    <tr>
                        <td width="100" align="left"><?php echo $show['course_id']; ?></td>
                        <td width="360" align="left"><?php echo $show['course_name']; ?></td>
                        <td width="80"><?php echo number_format($subject_credit_hr, 2); ?></td>
                        <td width="120"><?php echo round($finalexam_marks); ?></td>
                        <td width="90"><?php echo number_format(($gpa*$subject_credit_hr), 2); ?></td>
                        <td width="90"><?php echo $grade; ?></td>
                    </tr>
<?php
        }
            $average_percentage = ($total_marks_obtained/$total_marks) * 100;
            $average_gpa = $total_gpa/$total_crhr;
                        
            if($average_percentage >= 90 && $average_percentage <= 100) {
                    $average_grade = 'A+';
                }
            else if ($average_percentage >= 80 && $average_percentage <= 89) {
                    $average_grade = 'A';
                }
            else if ($average_percentage >= 70 && $average_percentage <= 79) {
                    $average_grade = 'B+';
                }
            else if ($average_percentage >= 65 && $average_percentage <= 69) {
                    $average_grade = 'B';
                }
            else if ($average_percentage >= 56 && $average_percentage <= 64) {
                    $average_grade = 'C+';
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
                    <tr>
                        <td align="left" colspan="6"  style="border-bottom:2px solid #000;">The examination was taken as a whole</td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" align="left">ERROR AND OMISSIONS ACCEPTED</td>
                        <td><?php echo $total_crhr; ?></td>
                        <td><?php echo $total_marks_obtained; ?></td>
                        <td><?php echo $total_gpa; ?></td>
                        <td><?php echo "GPA &ensp;&ensp; ".number_format($average_gpa, 2); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td></td>
            <td><font style="margin-left:320px;">Total Marks: <?php echo $total_marks; ?></font></td>
            <td align="right">Percentage: &ensp;&ensp;&ensp;&ensp; <?php echo number_format($average_percentage, 2); ?></td>
        </tr>
        
        <tr>
            <td>Prepared by:</td>
            <td>________________</td>
            <td></td>
        </tr>
        
        <tr>
            <td>Checked by:</td>
            <td>________________</td>
            <td></td>
        </tr>
        
        <tr>
            <td>Date:</td>
            <td>________________</td>
            <td></td>
        </tr>
        
        <tr><td></td></tr><tr><td></td></tr>
        
        <tr>
            <td colspan="3">Grading Procedure:</font></td>
        </tr>
        
        <tr>
            <td colspan="3" align="right"><font style="font-size:19px;">Controller of Examinations</font></td>
        </tr>
        
        <tr>
            <td height="326" colspan="3">
                <table width="300" cellpadding="5px" cellspacing="0px" class="subject_table" style="margin-left:40px;">
                    <tr>
                        <td align="left" colspan="3">The equivalent of marks %age, letter grade & grade point is as under:</td>
                    </tr>
                    
                    <tr>
                        <td><u>Marks %age</u></td>
                        <td><u>Letter Grade</u></td>
                        <td><u>Grade Point</u></td>
                    </tr>
                    <tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td>90-100</td>
                        <td>&ensp;A+</td>
                        <td>4.00</td>
                    </tr>
                    <tr>
                        <td>80-89</td>
                        <td>A</td>
                        <td>3.67</td>
                    </tr>
                    <tr>
                        <td>70-79</td>
                        <td>&ensp;B+</td>
                        <td>3.33</td>
                    </tr>
                    <tr>
                        <td>65-69</td>
                        <td>B</td>
                        <td>3.00</td>
                    </tr>
                    <tr>
                        <td>56-64</td>
                        <td>&ensp;C+</td>
                        <td>2.50</td>
                    </tr>
                    <tr>
                        <td>50-55</td>
                        <td>C</td>
                        <td>2.00</td>
                    </tr>
                    <tr>
                        <td>Below 50</td>
                        <td>E</td>
                        <td>0.00</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</div>
</div>

<?php
     echo "<hr>";   }
    

?>

</body>
</html>
