<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>
<?php include("models/database_connection.php"); ?>
<?php   if(isset($_POST['add'])) {
  
      $session_duration = $_POST['session_duration'];
      $session_name = $_POST['session_name'];
  
      $add_discipline = $pdo->query("INSERT INTO session VALUES('','$session_duration','$session_name');");
       
      
      if($add_discipline) {
                echo ' <script>
                            alert("New Session has been Added...");
                            location.replace("add_new_session.php");
                        </script>';
    }else{
                       echo ' <script>
                            alert("New Session Adding Query Error Try Again...");
                            location.replace("add_new_session.php");
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
                                 
                              Add New Session(s). . .
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-3"></div>        
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Enter Correct Data</h2>
                            <form action="" method="post">
                              
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                 <input class="input-field" type="text" name="session_duration" placeholder="Enter Session eg(2019-2023)">
                              </div>
                                
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                 <input class="input-field" type="text" name="session_name" placeholder="Enter Session Name eg : Fall / Spring ">
                              </div>
                                
                              <div class="input-container">
                                <input class="input-field btn-success" type="submit" name="add" value="Add Session">&nbsp;&nbsp;
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