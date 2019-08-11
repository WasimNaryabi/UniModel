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

                <div  class="col-md-12"style="color:white;background-color:#0a4d2b;margin-top:20px;margin-bottom:30px;padding:3px;border-radius:40px;margin-right:10px;">
                            <h2 class="text-center">Section Details</h2>
                        
                        </div>
                     <!-- Section Details start  -->
                     <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                             
                             <table class="table table-responsive table-hover table-stripped">
                                 <tr>
                                     
                                   <th>Discipline</th>
                                   <td>Computer Scinece</td>
                                     
                                   <th>Session</th>
                                   <td>2018-2021</td>
                                 
                                 </tr>
                                  
                                 <tr>
                                     <th>Semester</th>
                                     <td>4th</td>
                                     <th>Section</th>
                                     <td>B</td>
                                     
                                 </tr>
                                 <tr>
                                     <th ></th>
                                     <th >Subject</th>
                                     <td >Information Security</td>
                                     <td ></td>
                                 </tr>
                                
                             </table>


                        </div>
                     <!-- Section Details End -->
                    
                    <!-- section Attendance start -->
                    
                     <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Student Attendance Sheet</h2>
                    
                        <table class="table table-responsive table-hover table-stripped" border="1">
                            <tr class="bg-info">
                                <th>S.No</th>
                                <th>Class#</th>
                                <th>Name</th>
                                <th>Asg .NO</th>
                                <th>Asg Topic</th>
                                <th>File</th>
                                 
                            </tr>
                             
                            <?php 
                            
                             for($i=1 ; $i<=50;$i++){
                                 
                             
                            ?>
                            
                            <tr>
                                
                                <td>1</td>
                                <td>23</td>
                                <td>wasim ahmad S/O Ibrahim badshah</td>
                                <td>01</td>
                                <td>Classical Encription</td>
                                <td><input type="checkbox" name="vehicle3" checked></td>             
                            </tr>
                               <?php    
                             }
                            ?>
                             <!--end 1-->
                           
                                  <tr>
                                       <td colspan="6"><button type="submit" class="btn">Submit</button></td>
                                  </tr>
                          
                           
                        </table>
                        </div>
        
                    <!-- section Attendance end -->
                    
                    
                
            </div>          
        </div> 
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>