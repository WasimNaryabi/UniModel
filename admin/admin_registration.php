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
                                 
                                Hi! Mr Admin You Can Add New Admin Here
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Admin Personal Information</h2>
                            <form action="models/admin_registration_backend.php" method="post" enctype="multipart/form-data">
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="First  Name" name="first_name">
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Last  Name" name="last_name">
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Father  Name" name="father_name">
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                Select Gender:
                                 &nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="" type="radio" name="gender" value="Male">Male 
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                 <input class="" type="radio" name="gender" checked="" value="Female">Female
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                 <input class="" type="radio" name="gender" value="Others">Others
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="date"  name="dob">
                              </div>
                               
                               <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="New Admin Country " name="country">
                              </div>

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="New Admin City " name="city">
                              </div>

                              

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="New Admin CNIC # " name="cnic">
                              </div>

                              <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                <input class="input-field"  type="text" name="mobile_no" placeholder="New Admin Mobile #">
                              </div>
                                
                              <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                 <textarea name="address" class="input-field" placeholder="Full Address Of The New Admin here..."></textarea>
                              </div>

                              
                             

                        </div>
                                </div>
                                <!-- end of one side form -->
                                <!-- academic information area starts -->
                            <div class="col-md-6">
                                <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Make Account Here For New Admin</h2>
                             
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Select New Admin Image" readonly>
                                <input class="input-field" type="file" name="photo">
                              </div>
                              

                               <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Assign User Name To New Admin " name="user_name">
                              </div>
                            <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="password" placeholder="Assign Password Here To Member " id="password" name="password" required="" minlength="8" maxlength="15" onkeyup="check();">
                              </div>                           
                             

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="password" placeholder="Conform Password " id="confirm_password" name="confirm" required="" maxlength="15" minlength="8" onkeyup="check();"> 
                                <span id='message'></span>
                              </div>

                    <!-- coding for password matching starts-->

                                 <script type="text/javascript">
                                     
                                var check = function() {
                                  if (document.getElementById('password').value ==
                                    document.getElementById('confirm_password').value) {
                                    document.getElementById('message').style.color = 'green';
                                    document.getElementById('message').innerHTML = 'matching';
                                    document.getElementById('confirm_password').style.borderColor = "green";
                                  } else {
                                    document.getElementById('message').style.color = 'red';
                                    document.getElementById('message').innerHTML = 'not matching';
                                    document.getElementById('confirm_password').style.borderColor = "red";
                                  }
                                }
                                    $('#cnic').mask('99/99/9999');
                                 </script>
                    <!-- coding for password matching ends -->

                               
                
                             <div class="input-container">
                                <input class="input-field  btn-warning" type="reset" name="">&nbsp;&nbsp;&nbsp;
                                 <input onclick="return confirm('Are you sure to Create A New Admin Press OK/Cancel')" class="input-field  btn-success" type="submit" name="register">
                                 
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
