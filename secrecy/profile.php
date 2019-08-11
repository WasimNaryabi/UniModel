<!DOCTYPE html>
<html>
<?php include("models/database_connection.php"); ?>
<?php include("sliced/head.php");?>
<?php 
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $user_name = $_POST['user_name'];

    $query = $pdo->query("UPDATE secrecy SET user_name = '$user_name',password = '$pass',name='$name' ");
    if($query){
        echo '<script>
                alert("Profile Updated...");
                location.replace("profile.php");
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
              <div  class="col-md-12"style="color:white;background-color:#460000;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">
                                 
                                Your Personal Profile
                            </h2>
                        
                        </div>
                    <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <?php /*include("sliced/top_image.php");*/ ?>
                        <div  class="col-md-12"style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-right:10px;">
                            <h2 class="text-center">
                                 Admin  Personal Info Can Also Update From Here!
                            </h2>
                            <form action="profile.php" method="post">
                        <table class="table table-responsive table-hover table-stripped">
                            <?php
                             $sec_id = $_SESSION['secrecy_id'];
                             $query = $pdo->query("SELECT * FROM secrecy WHERE secrecy_id = '$sec_id'"); 
                             ?>
                             <?php while($show = $query->fetch(PDO::FETCH_ASSOC)){?>
                            <tr>
                                 
                                <th>Full Name</th>
                                <td>
                                <input type="text" name="name" value="<?php echo $show['name']; ?>">
                                </td>
                                 </tr>
                                 <tr>
                                <th>user Name</th>
                                <td>
                                <input type="text" name="user_name" value="<?php echo $show['user_name']; ?>">
                                </td>
                               
                            </tr>
                            <tr>
                                 
                                 
                                <th>Password</th>
                                <td colspan="1">
                                <input type="text" name="password" value="<?php echo $show['password']; ?>">
                                </td>
                               
                            </tr>
                             <?php } ?>
                            
                             <tr>

                                 <td colspan="4">
                                    <input type="submit" class="btn btn-danger" name="update" value="Update Info" onclick="confirm('Are You Sure To Update Your Profile Press OK/CANCEL');">
                                </td>
                             </tr>
                            
                            
                             
                        </table>
                        </form>
                        </div>
                        
                    </div>  
                     
                </div>
            </div>
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>