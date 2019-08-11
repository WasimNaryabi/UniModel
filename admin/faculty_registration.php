<!DOCTYPE html>
<html>

<?php include("sliced/head.php");
    $message = $_GET['msg'];

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
                                 
                                New Faculty Member Registraion
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Faculty Member Personal Information</h2>
                            <form action="models/facult_register_backend.php" method="post" enctype="multipart/form-data">
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="First  Name" name="first_name" required="">
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Last  Name" name="last_name" required="">
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Father  Name" name="father_name" required="">
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                Select Gender:
                                 &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="gender" value="Male" checked="">Male 
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                 <input type="radio" name="gender" value="Female">Female
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                 <input class="input-field" type="text" placeholder=" Date Of Birth" readonly="" >
                                <input class="input-field" type="date"  name="date_of_birth" required="">
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                               <input type="text" class="input-field" name="country" placeholder="Country Name" required="">  
                              </div>

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Faculty Member City " name="city" required="">
                              </div>

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text"   name="cnic" required="" id="cnic">
                              </div>

                              <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                <input class="input-field"  type="number" name="mobile_no" placeholder="Mobile #" required="">
                              </div>
                                
                              <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                 <textarea class="input-field" placeholder="Full Address Of The Member here..." name="address" required=""></textarea>
                              </div>

                              
                             

                        </div>
                                </div>
                                <!-- end of one side form -->
                                <!-- academic information area starts -->
                            <div class="col-md-6">
                                <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Make Account Here For Faculty Member</h2>
                             
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Select Faculty Member Image" readonly>
                                <input class="input-field" type="file" name="image">
                              </div>
                              

                               <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Assign User Name To The Member " name="user_name" required="">
                              </div>

                               <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="password" placeholder="Assign Password Here To Member " id="password" name="password" required="" minlength="8" maxlength="15" onkeyup="check();">
                              </div>                           
                             

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="password" placeholder="Conform Password " id="confirm_password" name="conform_password" required="" maxlength="15" minlength="8" onkeyup="check();"> 
                                <span id='message'></span>
                              </div>

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
                               
                
                             <div class="input-container">
                                <input class="input-field  btn-warning" type="reset" name="">&nbsp;&nbsp;&nbsp;
                                 <input class="input-field  btn-success" type="submit" name="register">
                                 
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