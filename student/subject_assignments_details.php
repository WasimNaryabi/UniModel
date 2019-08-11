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
        $subject_name = $_GET['subject_name'];
     
        $result_assignment = $pdo->query("select * from assignment_marks as am, faculty as f where am.student_history_id = '$student_history_id' and
                             am.course_id = '$subject_id' and am.faculty_id = f.faculty_id order by am.assignment_number;");
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
                                 
                                Subject Assignments Details
                            </h2>
                        
                        </div>
        
        <div class="" style="height:40px; width:100%; background-color:lightblue; border-radius:20px; margin-top:30px;">
            <div class="col-md-3 text-center"> </div>
             
            <div class="col-md-6 text-center">
                <table class="table">
                    <tr style="border:3px solid green;border-radius: 2px;" class="bg-info">
                          
                        <th>Instructor</th>
                        <td><?php echo $faculty; ?></td>
                        <th>&nbsp&nbsp;Subject Name   </th>
                        <td><?php echo $subject_name; ?></td>
                    </tr>
                     
                </table>
            </div>
            <div class="col-md-3 text-center"></div>
        </div>
        <!--new table-->
                <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px; border:2px solid #2c276c;margin-left:5px;border-top: none;">
                            
                    
                        <table class="table table-responsive table-hover table-stripped">
                            <tr class="bg-info">
                            <th>S.No</th>
                            <th width="90">Assig No.</th>
                            <th width="320">Topic</th>
                            <th width="145">Marks Obtained</th>
                            <th width="120">Total Marks</th>
                            <th width="120">Status</th>
                                               
 <?php
        while($show = $result_assignment->fetch(PDO::FETCH_ASSOC)) {
            
            $status = $show['marks_obtained'];
            $ass_no = $show['assignment_number'];
            $topic = $show['topic_name'];

            
?>    
    <tr>
        <td><font color="#000000"><?php echo $i; ?></font></td>
        <td><?php echo $ass_no; ?></td>
        <td><?php echo $topic; ?></td>
         <td><?php echo $show['marks_obtained']; ?></td>
        <td><?php echo $show['total_marks']; ?></td>        
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
                             
                             <!--end 1-->
                              
                            
                        </table>
                        </div>
        
        <!--2nd  table ends-->
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>