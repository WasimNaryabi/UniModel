
<!DOCTYPE html>
<html>

<?php include("sliced/head.php");
  

?>

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
                                 
                                Assignments Submition
                            </h2>
                        
                        </div>
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                             
                             <?php 
                             $user = $_SESSION['user'];
                            $pass = $_SESSION['password'];
  /////////////////////////////Query for courses selection////////////////////////////
                             $student_data_selection = $pdo->query("SELECT * FROM student WHERE uni_reg_number = '$user' and password = '$pass'");
                             $student_data_selection->setFetchMode(PDO::FETCH_ASSOC);
                             $student_data_selection->execute();
                             $student_data_store = $student_data_selection->fetch();
                             $student_id= $student_data_store['student_id'];
                             $dicipline_id = $student_data_store['discipline_id'];
                             //////////////////////////////////////////////////////////
                              $select_semester_id=$pdo->query("SELECT * FROM student_history where student_id = '$student_id'");
                             $select_semester_id->setFetchMode(PDO::FETCH_ASSOC);
                             $select_semester_id->execute();
                             $select_courses_store = $select_semester_id->fetch();
                             $semester_id = $select_courses_store['semester_id'];
///////////////////////////////////////Now Query for selection of courses/////////////////

                              $select_courses = $pdo->query("SELECT * FROM courses WHERE discipline_id = '$dicipline_id' and semester_id = '$semester_id'");
                             /* print_r($select_courses);exit();*/
//////////////////////////////////////////////////////////////////////////////////////////////

                              ?>
                            <form action="models/assignments_submit_backend.php" style="max-width:500px;margin:auto" method="post" enctype="multipart/form-data">
                               
                              <div class="input-container">

                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Assignments No." name="number">
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                

                                <select name="subject_name" class="input-field">
                                   <option hidden="">Select Subject</option>
                                   <?php
                                while($courses_names = $select_courses->fetch(PDO::FETCH_ASSOC)){?>
                                    <option value="<?php echo $courses_names['course_id']; ?>"><?php echo $courses_names['course_name']; ?></option>  
                                    <!-- <option selected="">Select Subject</option>   -->
                                     <?php } ?>
                                </select>
                               
                              </div>

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Topic " name="topic">
                              </div>

                              <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                <input class="input-field"  name="date" value="<?php echo date("Y/m/d")?>" readonly>
                              </div>
                                
                              <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                <input class="input-field" type="file" name="assignment" value="Attach Your File">
                              </div>

                              <input type="submit" name="upload" value="Upload Assignments" class="btn">
                            </form>

                        </div>
       
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>