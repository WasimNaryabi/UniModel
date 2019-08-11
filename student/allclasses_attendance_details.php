<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>

<body>
<?php
 
    include("models/database_connection.php");
   
     $course_id =  $_GET['subject_id'];
     $student_id = $_SESSION['student_id'];
        /*queru for studnet history id retrrivel*/
        $show_attandance = $pdo->query("SELECT * FROM student_history WHERE student_id = '$student_id'");
        while($history_id = $show_attandance->fetch(PDO::FETCH_ASSOC)){
                $h_id = $history_id['student_history_id'];
        }
    /*queru for studnet attandance table retrrivel*/
        $show_attandance = $pdo->query("SELECT * FROM attandance WHERE course_id = '$course_id' and student_history_id = '$h_id'");
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
                                 
                                Student Overall Attendance
                            </h2>
                        
                        </div>
        <div class="" >
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
                           
                            <tr class="bg-info text-center">
                                <th>Class.No</th>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Topic</th>
                                <th>Status</th>
                                 
                            </tr>
                                  <?php while ($result = $show_attandance->fetch(PDO::FETCH_ASSOC)) { 
                        $date = $result['date']."-".$result['month']."-".$result['year'];
                        $day = $result['day'];
                        $topic = $result['topic'];
                        $status = $result['status'];
                                   ?>   
                              
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $day; ?></td>
                                <td><?php echo $topic; ?></td>
                                <td>
                                    <?php
                                        if($status == 1){
                                            echo "<i class='fas fa-check 'style='color:green;font-size:20px'></i>";
                                        }else{
                                            echo '<i class="fas fa-times"style="color:red; font-size:20px;"></i>';
                                        }
                                    ?>                                     
                                 </td>
                                           
                            </tr>
                             <?php $i++;} ?> 
                             
                             <!--end 1-->
                              
                             
                             <!--end 2-->
                             <!--end 3-->
                             <!--end 4-->
                             <!--end 5-->
                             <!--end 6-->
                        </table>
                        </div>
        
        <!--2nd  table ends-->
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>