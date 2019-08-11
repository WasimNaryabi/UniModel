<!DOCTYPE html>
<html>

<?php include("sliced/head.php");?>
<?php 
include("models/database_connection.php");
/* SESSION CREATION. */

    $admin_id = $_SESSION['admin_id'];

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */

            $query_select = $pdo->prepare("select * from admin where admin_id = '$admin_id';");
            $query_select->setFetchMode(PDO::FETCH_ASSOC);
            $query_select->execute();
            $row = $query_select->fetch();

      $encrypt_password = $row['password'];

/* ======================================== Password Update Procedure ======================================== */
      
  if(isset($_POST['update'])) {
    
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    if($encrypt_password == md5($old_password) and $old_password != "") {
    
      if($old_password  and $new_password != $confirm_password and $new_password ="") {
?>
          <script>
                        alert("Password did not matches! Please try again...");
                        location.replace("update_password.php");
                    </script>
<?php
        } else {
            
          $encrypt_confirmed_password = md5($confirm_password);
        
          $query_update_password = $pdo->query("update admin set password = '$encrypt_confirmed_password' where admin_id = '$admin_id'");
           
  
            if($query_update_password) {
?>
                <script>
                                    alert("Password Updated...");
                                    location.replace("models/logout.php");
                                </script>
<?php
            }
        } 
    } else {
?>
        <script>
          alert("Sorry! Your Old Password is Incorrect Or Empty Field...");
            location.replace("update_password.php");
        </script>
<?php     
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
                                 
                                Update Your Password Here
                            </h2>
                        
                        </div>
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Update Password</h2>
                            <form action="update_password.php" method="post" style="max-width:500px;margin:auto">
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Type your Old Password" name="old_password">
                              </div>
                              

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Type New Password " name="new_password">
                              </div>
                                 <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Confirm New Password " name="confirm_password">
                              </div>
                              

                              <input type="submit" class="btn btn-success" name="update" value="Update Now" >
                            </form>

                        </div>
       
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>