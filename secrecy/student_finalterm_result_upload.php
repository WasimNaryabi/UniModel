<!DOCTYPE html>
<html>
<?php include("models/student_finalterm_result_upload_backend.php"); ?>
<?php include("models/students_final_marks_backend.php"); ?>
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
        
         <div  class="col-md-12"style="color:white;background-color:#460000;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">
                                 
                               Students Final-Term Result Sheet
                            </h2>
                        </div>
                        <div class="row" >
                          <div class="col-md-12" style="border: 2px solid #460000;border-radius: 10px; font-weight: bold;font-size: 16px;background-color: #460000;color: white;">
                          <table class="table    table-info">
                              <tr>
                                  <td width="400">Discipline: <?php echo $discipline_name; ?></td>
                                  <td width="275">Session: <?php echo $session_duration." [".$session_name."]"; ?></td>
                                  <td width="200">Semester:<?php echo $semester_name; ?></td>
                                  <td width="100">Section: <?php echo $section_name; ?></td>
                              </tr>
                
                                
                
                                  <tr>
                                      <td colspan="4" align="center">Subject:<?php echo $course_name." - [".$course_id."]"; ?></td>
                                  </tr>

                           </table>

                          </div>
                        </div>
<!-- FROM HERE THE SECOND TABLE AND FORM ARE STARTNG -->
                            <div class="row">
                                <div class="col-md-12">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;" class="text-center">
                           
                     <form action="models/student_finalterm_result_upload_backend.php" method="post" enctype="multipart/form-data">
          <table class="table table-bordered table-info table-hover table-responsive">
                <tr>
                    <th height="50" colspan="7" bgcolor="#460000" style="color:white;border:1px solid #FFF; border-bottom:0px;">
                      <h3 class="text-center">Please Fill The Obtained Marks Field  In 70 Marks And Then Submit </h3>
                    </th>
                </tr>
                
                <tr>
                    <th width="55" style="border-bottom:1px solid #666; border-right:1px solid #666;">S. No.</th>
                    <th width="85" style="border-bottom:1px solid #666; border-right:1px solid #666;">Class No.</th>
                    <th width="450" style="border-bottom:1px solid #666; border-right:1px solid #666;">Full Name</th>
                    <th width="95" style="border-bottom:1px solid #666; border-right:1px solid #666;">Mid-Term Marks</th>
                    <th width="110" style="border-bottom:1px solid #666; border-right:1px solid #666;">Marks Obtained</th>
                    <th width="120" style="border-bottom:1px solid #666;">Total Marks</th>
                </tr>
<?php
    while($show_marks =  $result_marks->fetch(PDO::FETCH_ASSOC)) {
      
      $assignment_marks = $show_marks['ass_marks'];
      $assignment_total_marks = $show_marks['ass_total'];
      $assignment_ratio = ($assignment_marks/$assignment_total_marks) * 10;

      $quiz_marks = $show_marks['quiz_marks'];
      $quiz_total_marks = $show_marks['quiz_total'];
      $quiz_ratio = ($quiz_marks/$quiz_total_marks) * 5;
      
      $midterm_marks = $show_marks['mid_marks'];
      $midterm_total_marks = $show_marks['mid_total'];
      $midterm_result = $assignment_ratio + $quiz_ratio + $midterm_marks;
      
      $name = $show_marks['first_name']." ".$show_marks['last_name'];
      $father_name = $show_marks['father_name'];
      $gender = $show_marks['gender'];
        
      if ($gender == "male" or $gender == "Male") {
          $gender = " S/O ";
        } else {
          $gender = " D/O ";
        }
?>
                <tr align="center">
                  
                    <td style="border-bottom:1px solid #666; border-right:1px solid #666;"><?php echo $i."."; ?></td>
                    <td style="border-bottom:1px solid #666; border-right:1px solid #666;"><?php echo $show_marks['roll_number']; ?></td>
                    <td align="left" style="border-bottom:1px solid #666; border-right:1px solid #666;"><?php echo $name.$gender.$father_name; ?></td>
                    <td style="border-bottom:1px solid #666; border-right:1px solid #666;">
                      <input type="text" name="assignment_marks" value="<?php echo round($midterm_result); ?>" readonly style="width: 30px"/> /30</td>
            <td style="border-bottom:1px solid #666; border-right:1px solid #666;">
                      <input type="text"  name="<?php echo $show_marks['student_history_id']; ?>" maxlength="4" placeholder="00" pattern="[0-9/.]+" 
                         title="Insert only numeric values." autofocus   style="width: 30px"   /> /70</td>
                  <td style="border-bottom:1px solid #666;">
                      <input type="text" name="total_marks" value="100" readonly style="width: 40px"  /></td>
              </tr>
<?php
      $i = $i+1;
    }
?>
              <tr>
                  <td align="center" colspan="7"><input type="submit" name="upload" id="submit" value="Submit" /></td>
              </tr>
          </table>
    </form>

                        </div>
       
                            </div>
                            </div>
        
            
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>