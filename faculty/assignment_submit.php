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
        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Assignment Submition</h2>
                            <form action="" style="max-width:500px;margin:auto">
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Assignments No." name="usrnm">
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <select name="subject" class="input-field">
                                    <option>Subject Name</option>  
                                    <option>Biology</option>  
                                    <option>Chemistry</option>  
                                    <option>Computer Science</option>  
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

                              <button type="submit" class="btn">Submit</button>
                            </form>

                        </div>
       
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>