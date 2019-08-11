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

                       <div  class="col-md-12"style="color:white;background-color:#0a4d2b;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">
                              Search Section for Assignment Marks
                            </h2>
                        
                        </div>
      
                    
                    <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                           

                                       <form action="assignment_marks_upload.php" method="post" style="max-width:500px;margin:auto">
                            
                                           <!-- discipline selection -->
                                           
                              <div class="input-container">
                                <?php $dicipline_id = $pdo->query("SELECT * FROM discipline ORDER BY discipline_id"); ?>
                                <i class="fa fa-user icon"></i>
                                
                                <select required name="discipline" class="input-field" id="discipline">
                                    <option value="0">Select Discipline</option>
                                   <?php 
                                while($discipline_id = $dicipline_id->fetch(PDO::FETCH_ASSOC)){
                                    $disiplin_id = $discipline_id['discipline_code'];?>
                                        <option  value="<?php echo $discipline_id['discipline_id']; ?>"><?php echo $discipline_id['discipline_code']; ?></option>
                                <?php }  ?>
                                     
                                      
                                </select>
                              </div>
                                
                               <!-- Session selection -->
                              <div class="input-container">
                                <?php $session_id = $pdo->query("SELECT * FROM session ORDER BY session_id "); ?>
                                <i class="fa fa-user icon"></i>
                                
                                <select name="session" class="input-field"  required="" id="session">
                                    <option value="0">Select Session</option>
                                   <?php 
                                while($store_session_id = $session_id->fetch(PDO::FETCH_ASSOC)){?>
                                        <option  value="<?php echo $store_session_id['session_id']; ?>"><?php echo $store_session_id['session_duration']."  (".$store_session_id['session_name'].")"; ?></option>
                                <?php }  ?>
                                     
                                      
                                </select>
                              </div>

                                 <!-- Semester selection -->
                              <div class="input-container">
                                <?php $semester_id = $pdo->query("SELECT * FROM semester ORDER BY semester_id "); ?>
                                <i class="fa fa-user icon"></i>
                                
                                <select name="semester" class="input-field" required="" onChange=getSubjects(this.value); id="semester">
                                    <option value="0">Select semester</option>
                                   <?php 
                                while($store_semester_id = $semester_id->fetch(PDO::FETCH_ASSOC)){ $sem_id = $store_semester_id['semester_id']?>
                                        <option  value="<?php echo $store_semester_id['semester_id']; ?>"><?php echo $store_semester_id['semester_name']; ?></option>
                                <?php }  ?>
                                     
                                      
                                </select>
                              </div>


                                     <!-- Section selection -->
                              <div class="input-container">
                                <?php $section_id = $pdo->query("SELECT * FROM section ORDER BY section_id "); ?>
                                <i class="fa fa-user icon"></i>
                                
                                <select name="section" class="input-field" required="" onChange=getSubjects(this.value); id="semester">
                                    <option value="0">Select Section</option>
                                   <?php 
                                while($store_section_id = $section_id->fetch(PDO::FETCH_ASSOC)){ $sem_id = $store_semester_id['section_id']?>
                                        <option  value="<?php echo $store_section_id['section_id']; ?>"><?php echo $store_section_id['section_name']; ?></option>
                                <?php }  ?>
                                     
                                      
                                </select>
                              </div>

                                          <input type="submit" name="search" class="btn" value="Search"> 


                                
                              </form>
                        </div>

                </div>
    
         </div>          
    </div> 
    

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>