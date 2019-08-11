<?php include('models/student_dashboard_backend.php'); ?>
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
              <div  class="col-md-12"style="color:white;background-color:#2c276c;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">
                                 
                                Subjects In Current Semeter
                            </h2>
                        
                        </div>
        <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <?php $student_id = $data['student_id'];
                                  $discipline_id = $data['discipline_id'];
                                   
                                   
                                ///////////////////////////////////////////////////////////
                                $select_semester = $pdo->prepare("SELECT * FROM student_history WHERE student_id = '$student_id'");
                                   $select_semester -> setFetchMode(PDO::FETCH_ASSOC);
                                    $select_semester ->execute();
                                    $semester_id = $select_semester-> fetch();
                                    $store_semester_id = $semester_id['semester_id'];
                                    //here the student history is stored about condition
                                    //recieve semester id from student history  table

                                    //////////////////////////////////////////////////////////
                                    $select_courses = $pdo->query("SELECT * FROM courses WHERE discipline_id = '$discipline_id' and semester_id = '$store_semester_id'");
                                    //here in this query the courses table data are stored about conditoin 
                                    //recieveing course id through here
                                    ///////////////////////////////////////////////////////////

                                 

                             ?>
                        <table class="table table-responsive table-hover table-stripped">
                            <tr>
                                <th>S.No</th>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Credit Hours</th>
                                <th>Teacher</th>
                                <th>Outline</th>
                                 
                            </tr>
                            <?php 
                                $total_creditHours = 0;
                                $i = 1;
                            while ($row = $select_courses->fetch(PDO::FETCH_ASSOC)) {
                                  $course_id_save = $row['course_id'];
                                   
                                   //here in this query the courses_outlines are stored
                              ?>
                            <tr>
                                
                                <td><?php  echo $i; ?></td>
                                <td><?php echo $row['course_id']; ?></td>
                                <td><?php echo $row['course_name']; ?></td>
                                <td><?php echo $row['credit_hours']; ?></td>
                                <td>Nill</td>
                                <?php 
                            //////////this while loop is for to pick the outlines//////////////
                                 $course_outline=$pdo->prepare("SELECT * FROM course_outlines WHERE course_id = '$course_id_save'");
                                    $course_outline->setFetchMode(PDO::FETCH_ASSOC);
                                    $course_outline->execute();
                                    $outline1 = $course_outline->fetch();
                                  $location = '../BS(IT)CourseOutlines';
                            //////////////////////////////////////////////////////////////////
                                      ?>
                               <td><a href="<?php //echo $location.$outline1['files_path']; ?>"> <?php // echo $location.$outline1['files_path']; ?>
                              <i style="color:lightblue" class="fas fa-download"></i>  
                               </a> 
                               </td>
                                
                                <?php 
                                $total_creditHours = $total_creditHours + $row['credit_hours'];
                             
                               $i++;
                                } ?>
                                 
                                
                         
                                
                                 
                            </tr>

                            
                             
                             <!--end 1-->
                             
                              
                             
                             
                             
                            
                            <tr>
                                <th>Total Credit Hours</th>
                                <td></td>
                                <td></td>
                                <td><?php echo $total_creditHours; ?></td>
                                <td></td>
                                 
                                 
                            </tr>
                             <!--end 2-->
                             <!--end 3-->
                             <!--end 4-->
                             <!--end 5-->
                             <!--end 6-->
                        </table>
                        </div>
        
    </div>          
        </div> 
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>