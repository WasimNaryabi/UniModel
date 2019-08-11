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
                            <h2 class="text-center">Search Section for View Assignment</h2>

                        </div>
                    
                    <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                          

                                        <form action="class_assignment_details.php" style="max-width:500px;margin:auto">
                            
                                          <div class="input-container">
                                            <i class="fa fa-user icon"></i>
                                            <select name="Degree" class="input-field">
                                                <option>Discipline</option> 
                                                <option>BSCS</option>  
                                                <option>BSIT</option>  
                                                <option>BBA</option>  
                                                <option>MSIT</option>  
                                            </select>
                                          </div>

                                            <div class="input-container">
                                            <i class="fa fa-user icon"></i>
                                            <select name="session" class="input-field">
                                                 <option>Session</option>
                                                <option>2016-2019</option>  
                                                <option>2017-2020</option>  
                                                <option>2018-2021</option>  
                                                <option>2019-2022</option>  
                                            </select>
                                          </div>
                                            <div class="input-container">
                                            <i class="fa fa-user icon"></i>
                                            <select name="semester" class="input-field">
                                                <option>Semester</option> 
                                                <option>1st</option>  
                                                <option>2nd</option>  
                                                <option>3rd</option>  
                                                <option>4th</option>  
                                                <option>5th</option>  
                                                <option>6th</option>  
                                                <option>7th</option>  
                                                <option>8th</option>  
                                            </select>
                                          </div>
                                            <div class="input-container">
                                            <i class="fa fa-user icon"></i>
                                            <select name="section" class="input-field">
                                                <option>Section</option>  
                                                <option>A</option>  
                                                <option>B</option>  
                                                <option>D</option>
                                                <option>E</option>  
                                                <option>F</option>  
                                                <option>G </option> 
                                            </select>
                                          </div>
                                            <div class="input-container">
                                            <i class="fa fa-user icon"></i>
                                            <select name="section" class="input-field">
                                                <option>Subject</option>  
                                                <option>Information security</option>  
                                                <option>Compiler constructor</option>  
                                                <option>Android</option>
                                                <option>Java</option>  
                                                <option>C#</option>  
                                                <option>Database </option> 
                                            </select>
                                          </div> 

                                          <button type="submit" class="btn">Search</button>

                                
                              </form>
                        </div>

                </div>
    
         </div>          
    </div> 
    

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>