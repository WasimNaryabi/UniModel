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
                                 
                                Faculty Member Searching Portal
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-3"></div>        
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Fill The Form With Correct Info..</h2>
                            <form action="models/specific_faculty_full_record_backend.php" method="post">

                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <select name="full_name" class="input-field">
                                  <option selected="" hidden="">Select Faculty Member</option>
                                <?php $select = $pdo->query("SELECT * FROM faculty");
                                while($store = $select->fetch(PDO::FETCH_ASSOC)){
                                  $first_name = $store['first_name'];
                                  $last_name  =$store['last_name'];
                                  $faculty_members = $first_name." ".$last_name; 
                               ?>
                                <option value="<?php echo $faculty_members; ?>">
                                  <?php echo $faculty_members; ?>
                                </option>
                                  
                                
                                <?php };?>
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