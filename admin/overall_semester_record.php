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
                                 
                                Over All Semester Records
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-3"></div>        
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Search Student Categories</h2>
                            <form action="display_overall_semester_record.php" method="post">
                              
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
                                <select name="semester" class="input-field">
                                            <option selected="">- Semester -</option>
                                <?php $semester_name = $pdo->query("SELECT * FROM semester");
                                 while ($store_semester = $semester_name->fetch(PDO::FETCH_ASSOC)) {
                                              
                                          ?>
                                            <option value="<?php echo $store_semester['semester_id']; ?>"><?php echo $store_semester['semester_name']; ?></option>
                                        <?php }?>
                                              
                                </select>
                              </div>
                              
                                
                              <div class="input-container">
                                 
                                <input class="input-field btn-success" type="submit" name="display" value="Search">&nbsp;&nbsp;
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