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
             
        <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Final Result</h2>
                        <table class="table table-responsive table-hover table-stripped">
                            <tr class="bg-info">
                                <th>S.No</th>
                                <th>Course code</th>
                                <th>Subject</th>
                                <th>Mid-Exame Marks</th>
                                <th>Final-Exame Marks</th>
                                <th>Obtained Marks</th>
                                <th>Total Marks</th>
                                <th>Grade</th>
                                <th>GPA</th>
                                <th>%Age</th>
                                 
                            </tr>
                            <tr>
                                
                                <td>1</td>
                                <td>CS-111</td>
                                <td>Information security</td>
                                <td> 18</td>
                                <td> 62</td>
                                <td> 80</td>
                                <td> 100</td>
                                <td> A</td>
                                <td> 3.5</td>
                                 
                              
                               
                                <td>  <div class="meter" style="width:74%;background:linear-gradient(to bottom, green , 70%, #0C0)">
                    <font id="percent-font">74%</font>
                </div></td>
                                <td><a href="quizs_details.php"><i class="fas fa-address-book"></i></a></td>
                              
                                 
                            </tr>
                            
                            <tr class="bg-success">
                                <th>Total</th>
                                
                                <th> </th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>459</td>
                                <td>600</td>
                                <td>B</td>
                                <td>3.45</td>
                                <td>56%</td>
                                
                                
                                 
                            </tr>
                             
                             <!--end 1-->
                              
                             <!--end 2-->
                             <!--end 3-->
                             <!--end 4-->
                             <!--end 5-->
                             <!--end 6-->
                        </table>
                        </div>
        
    </div>          
        </div> 
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>