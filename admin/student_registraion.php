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
                                 
                                New Student Registraion
                            </h2>
                        </div>

                            <div class="row">
                                <div class="col-md-6">        
                 <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Student Personal Information</h2>
                            <form action="models/student_registraion_backend.php" method="post" enctype="multipart/form-data">
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
                                <input class="" type="radio" name="gender" value="male" checked="">Male 
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                 <input class="" type="radio" name="gender" value="female">Female&nbsp;&nbsp;&nbsp;&nbsp;
                                 <input type="radio" name="gender" value="other"> Other
                              </div>
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                 <input class="input-field" type="text" placeholder=" Date Of Birth" readonly="">
                                <input class="input-field" type="date"  name="dob">
                              </div>
                             

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Student Country" name="country">
                              </div>

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Student City " name="city">
                              </div>

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Student CNIC " name="cnic">
                              </div>

                              <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                <input class="input-field"  type="text" name="mobile" placeholder="Mobile No">
                              </div>
                                
                              <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                 <textarea class="input-field" placeholder="Full Address Of The Student here..." name="address"></textarea>
                              </div>

                              
                             

                        </div>
                                </div>
                                <!-- end of one side form -->
                            <div class="col-md-6">
                                <div  style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Student Academic Information</h2>
                             
                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Select Stdent Image" readonly>
                                <input class="input-field" type="file" name="photo">
                              </div>
                             
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
                                <select name="section" class="input-field">
                                            <option selected="">- Section -</option>
                                <?php $section_name = $pdo->query("SELECT * FROM section");
                                 while ($store_section = $section_name->fetch(PDO::FETCH_ASSOC)) {
                                              
                                          ?>
                                            <option value="<?php echo $store_section['section_id']; ?>"><?php echo $store_section['section_name']; ?></option>
                                        <?php }?>
                                              
                                </select>
                              </div>


                              <div class="input-container">
                                <i class="fa fa-user icon"></i>
                               <select id="roll_number" name="roll_number"  class="input-field">
                            <option value="0">Class No.</option>
<?php 
            for($i = 1,$j = 1; $i <= 300,$j <= 300; $i++,$j++) { 
?>
                            <option value="<?php echo $i; ?>"><?php echo $j; ?></option>
<?php
            }
?>
                        </select>
                              </div>

                              

                              <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Assign Password Here To Student " name="password">
                              </div>

                              <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                <input class="input-field" type="text" placeholder="University Registraion Number " name="uni_regno" >
                              </div>
                              &nbsp;&nbsp;&nbsp;i.e. 2012-2015-Agr-U-00000.
                
                             <div class="input-container">
                                <input class="input-field  btn-warning" type="reset" name="">&nbsp;&nbsp;&nbsp;
                                 <input class="input-field  btn-success" type="submit" name="reg">
                                 
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