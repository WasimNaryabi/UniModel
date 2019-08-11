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
        
         <div  class="col-md-12"style="color:white;background-color:#811b85;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">
                                 
                                Search Student Either By Name Or By Basic Info
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Search By Name</h2>
                            <form action="models/specific_student_full_record_backend.php" method="post">
                                  
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Student First Name Or Full Name" name="first_name">
                              </div>
                              
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Last Name" name="last_name">
                              </div> 

                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Father Name" name="father_name">
                              </div> 

                              <div class="input-container">
                                 
                                <input class="input-field btn-success" type="submit" name="search_name" value="Search">&nbsp;&nbsp;
                                <input class="input-field btn-warning" type="reset" name="" value="Reset">
                              </div>  
                              
                               

                              
                            </form>

                        </div>
       
                            </div>
                            <!-- ends the name searchin form -->       
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Search BY Info</h2>
                            <form action="models/specific_student_full_record_backend.php" method="post">
                                  
                               

                              <div class="input-container">
                                <i class="fa fa-user icon"></i>

                                <select name="discipline" class="input-field">
                                     <!-- DISCIPLINE RETRIVEL  -->
                                        <?php $discipline_name = $pdo->query("SELECT * FROM discipline");
                                 while ($store = $discipline_name->fetch(PDO::FETCH_ASSOC)) {
                                              
                                          ?>
                                        <option value="<?php echo $store['discipline_id']; ?>">
                                            <?php echo $store['discipline_code']." "; ?>
                                        </option>
                                    <?php }?>
                                        <option selected="">- Discipline -</option>
                                         
                                </select>
                              </div>

                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <select name="session" class="input-field">
                                            <option selected="">- Session -</option>
                                <?php $session_name = $pdo->query("SELECT * FROM session");
                                 while ($store_session = $session_name->fetch(PDO::FETCH_ASSOC)) {
                                              
                                          ?>
                                            <option value="<?php echo $store_session['session_id']; ?>"><?php echo $store_session['session_duration']; ?></option>
                                        <?php }?>
                                              
                                </select>
                              </div>
                                
                                 <div class="input-container">
                              <i class="fa fa-user icon"></i>
                              <select id="roll_number" name="roll_number" class="input-field">
                                    <option value="0">Class No.</option>
<?php
    $search_rollno = $pdo->query("SELECT distinct(roll_number) as 'roll_number' from student ORDER BY roll_number ASC");
     

      while($show = $search_rollno->fetch(PDO::FETCH_ASSOC)){
?>   
                                    <option value="<?php echo $show['roll_number']; ?>"><?php echo $show['roll_number']; ?></option>
<?php
      }
?>
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