 
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
        
         <div  class="col-md-12"style="color:white;background-color:#460000;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">
                                 
                                Students Final Exam Marking. . .
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-3"></div>        
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Search Student Categories</h2>
                            <form action="student_finalterm_result_upload.php" method="post">
                              
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

                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <select name="section" class="input-field">
                                            <option selected="">- Sectoin -</option>
                                <?php $section_name = $pdo->query("SELECT * FROM section");
                                 while ($store_section = $section_name->fetch(PDO::FETCH_ASSOC)) {
                                              
                                          ?>
                                            <option value="<?php echo $store_section['section_id']; ?>"><?php echo $store_section['section_name']; ?></option>
                                        <?php }?>
                                              
                                </select>
                              </div>                             

                                    <!-- Subjects Selection -->
                                <div class="input-container">
                            
                                        <i class="fa fa-user icon"></i>
                                        
                                        <select name="subject" class="input-field" required="" id="subject">
                                            <option value="0">Select Subjects</option>
                                </select>
                              </div>
                                
                              <div class="input-container">
                                 
                                <input class="input-field btn-success" type="submit" name="search" value="Search">&nbsp;&nbsp;
                                <input class="input-field btn-warning" type="reset" name="" value="Reset">
                              </div>  
                              
                               

                              
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
 <script type="text/javascript">

    <!-- Using INNERHTML Technique for the retrival of server page on the client -->

    function getSubjects(subjectId) {

        var id = parseInt(subjectId);
        var descipline = document.getElementById("discipline").value;
        
    if (id == 0 || id == -1) {
        return;
      }
    
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
      } else {// code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById('subject').innerHTML = xmlhttp.responseText;
        /*alert(xmlhttp.responseText);*/
        }
      }
     
    xmlhttp.open("GET","get_course.php?semester_id=" + id + "&descipline=" + descipline,true);
    xmlhttp.send();
    }

</script>