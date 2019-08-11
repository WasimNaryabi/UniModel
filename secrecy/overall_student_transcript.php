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
                                 
                                OverAll Students Transcript. . .
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-3"></div>        
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Search Student Categories</h2>
                            <form action="models/overall_student_transcript_backend.php" method="post">
                              
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <select name="discipline" class="input-field">
                                        <option value="0">- Discipline -</option>
                  <?php
                  $select_discipline = $pdo->query("select * from discipline order by discipline_id");
                  while($show = $select_discipline->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                       <option value="<?php echo $show['discipline_id']; ?>"><?php echo $show['discipline_code']; ?></option>
                  <?php
                                }
                    ?> 
                       
                                </select>
                              </div>

                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <select name="session" class="input-field">
                                            <option value="0">- Session -</option>
                                            <?php
                        $select_session =$pdo->query("select * from session order by session_id");
                         
                        
                            while($show = $select_session->fetch(PDO::FETCH_ASSOC)){
                ?>
                                            <option value="<?php echo $show['session_id']; ?>"><?php echo $show['session_duration']; ?></option>
                <?php
                            }
                ?> 
                                </select>
                              </div>
                                

                               <div class="input-container">
                                    <i class="fa fa-user icon"></i>
                                    <select name="semester" class="input-field">
                                        <option value="0" selected="">- Semester -</option>
                                                        <?php
                         $select_semester =$pdo->query("select * from semester order by semester_id asc");
                         
                            
                            while($show = $select_semester->fetch(PDO::FETCH_ASSOC)){
                ?>
                             <option value="<?php echo $show['semester_id']; ?>"><?php echo $show['semester_name']; ?></option>
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