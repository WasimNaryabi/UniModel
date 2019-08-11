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
                            <h2 class="text-center">Student Overall Quizs Details</h2>
                        <table class="table table-responsive table-hover table-stripped">
                            <tr>
                                <th>S.No</th>
                                <th>Course code</th>
                                <th>Title</th>
                                <th>Total Marks</th>
                                <th>Obtain Marks</th>
                                <th>Percentage</th>
                             
                                <th>Details</th>
                            </tr>
                            <tr>
                                
                                <td>1</td>
                                <td>CS-111</td>
                                <td>Information security</td>
                                <td> 25</td>
                                <td> 20</td>
                              
                               
                                <td>  <div class="meter" style="width:74%;background:linear-gradient(to bottom, green , 70%, #0C0)">
                    <font id="percent-font">74%</font>
                </div></td>
                                <td><a href="quizs_details.php"><i class="fas fa-address-book"></i></a></td>
                              
                                 
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