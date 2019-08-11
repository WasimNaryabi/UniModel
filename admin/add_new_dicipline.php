<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>
<?php include("models/database_connection.php"); ?>
<?php   if(isset($_POST['add'])) {
  
      $discipline_name = $_POST['discipline_name'];
      $discipline_code = $_POST['discipline_code'];
  
      $add_discipline = $pdo->query("INSERT INTO discipline VALUES('','$discipline_name','$discipline_code');");
       
      
      if($add_discipline) {
                echo ' <script>
                            alert("New Discipline has been Added...");
                            location.replace("add_new_dicipline.php");
                        </script>';
    }else{
                       echo ' <script>
                            alert("New Discipline Adding Query Error Try Again...");
                            location.replace("add_new_dicipline.php");
                        </script>';
    }
  }
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
        
         <div  class="col-md-12"style="color:white;background-color:#811b85;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">
                                 
                              Add New  Discipline(s)
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-3"></div>        
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Enter Correct Data</h2>
                            <form action="add_new_dicipline.php" method="post">
                              
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                 <input class="input-field" type="text" name="discipline_name" placeholder="Enter Dicipline Name  eg(Ecnomic Studies)">
                              </div>
                                
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                 <input class="input-field" type="text" name="discipline_code" placeholder="Enter Dicipline Code eg : BS-(ES) ">
                              </div>
                                
                              <div class="input-container">
                                <input class="input-field btn-success" type="submit" name="add" value="Add Dicipline">&nbsp;&nbsp;
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