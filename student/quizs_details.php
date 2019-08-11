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
    $row = $query_select->fetch();
    
    $discipline_id = $row['discipline_id'];
    
/* ======================================== Select Query for Retrival of Student History from Database ======================================== */

        $query_student_history =$pdo->prepare("select max(student_history_id) as sh_id from student_history where student_id = '$id';");
     $query_student_history->setFetchMode(PDO::FETCH_ASSOC);   
    $query_student_history->execute();
    $row = $query_student_history->fetch();
        
        $student_history_id = $row['sh_id'];

       /* echo $student_history_id;exit();*/
        
        $query_student_semester = $pdo->prepare("select * from student_history where student_history_id = '$student_history_id';");
        $query_student_semester->setFetchMode(PDO::FETCH_ASSOC);   
    $query_student_semester->execute();
    $row = $query_student_semester->fetch();
        
        $semester_id = $row['semester_id'];
 
/* ======================================== Query for Retrival of Student's Subjectwise - Attandance from Database ================================== */
    
        $subject_id = $_GET['subject_id'];
         
     
        $result_quiz = $pdo->query("select * from quiz_marks as qm, faculty as f where qm.student_history_id = '$student_history_id' and qm.course_id = '$subject_id'
                       and qm.faculty_id = f.faculty_id order by qm.quiz_number;");
        /*$result_assignment->setFetchMode(PDO::FETCH_ASSOC);   
    $result_assignment->execute();
    $row = $result_assignment->fetch();
       echo $row['assignment_marks_id'];exit();*/
        
       
         
         
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
                                 
                                 Subject Quizs Details
                            </h2>
                        
                        </div>
        <div class="" style="height:40px; width:100%; background-color:lightblue; border-radius:20px; margin-top:30px;">
            <div class="col-md-3 text-center"> </div>
             
            <div class="col-md-6 text-center">
                <table class="table" style="height:40px;  background-color:lightblue; border-radius:0px 0px 30px 30px; margin-top:0px; color: black"> 
                   
                    <tr>
                        <th>Teacher Name   </th>
                        <td><?php echo $_GET['teacher']; ?></td>
                        
                        <th>&nbsp&nbsp;Subject Name   </th>
                        <td><?php  echo $_GET['subject'];  ?></td>
                    </tr>
                     
                </table>
            </div>
            <div class="col-md-3 text-center"></div>
        </div>
        <!--new table-->
                <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            
                        <table class="table table-responsive table-hover table-stripped">
                            <tr bgcolor="#E4E4E4">
        <th width="65" height="50">S. No.</th>
        <th width="75" height="50">Quiz No.</th>
        <th width="350">Topic Name</th>
        <th width="135">Marks Obtained</th>
        <th width="107">Total Marks</th>
        <th width="120">Status</th>
    </tr>
    <?php
        while($show = $result_quiz->fetch(PDO::FETCH_ASSOC)) {
            
            $status = $show['obtained_marks'];
            $faculty_name = $show['first_name']." ".$show['last_name'];
?>    
    
                        <tr>
                            <td><font color="#000000"><?php echo $i ?></font></td>
                            <td><?php echo $show['quiz_number']; ?></td>
                            <td><?php echo $show['topic_name']; ?></td>
                            <td><?php echo $show['obtained_marks']; ?></td>
                            <td><?php echo $show['total']; ?></td>
                            <td>
                                <?php
                                if($status >= 1){
                                    echo "<i class='fas fa-check 'style='color:green;font-size:20px'></i>";
                                } 
                            ?>  
                            </td>
                        </tr>

                    <?php
                            $i = $i + 1;
                        } 
                    ?>
                           
                        </table>
                        </div>
        
        <!--2nd  table ends-->
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>