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
  
        
        <div class="" style="height:40px; width:100%; background-color:lightblue; border-radius:20px; margin-top:30px;">
            <div class="col-md-3 text-center"> </div>
             
            <div class="col-md-6 text-center">
                <table class="table">
                    <tr>
                        <th>Teacher Name   </th>
                        <td>H.Bilal</td>
                        
                        <th>&nbsp&nbsp;Subject Name   </th>
                        <td>Java</td>
                    </tr>
                     
                </table>
            </div>
            <div class="col-md-3 text-center"></div>
        </div>
        <!--new table-->
                <div style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-left:5px;">
                            <h2 class="text-center">Student Overall Attendance</h2>
                    
                        <table class="table table-responsive table-hover table-stripped">
                            <tr class="bg-info">
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Topic</th>
                                <th>Status</th>
                                 
                            </tr>
                            <tr>
                                
                                <td>1</td>
                                <td>22-01-2019</td>
                                <td>If-Else</td>
                                <td>Absent</td>             
                            </tr>
                             
                             <!--end 1-->
                              
                            <tr>
                                
                                <td>1</td>
                                <td>22-01-2019</td>
                                <td>If-Else</td>
                                <td>Absent</td>             
                            </tr>
                            <tr class="bg-danger">
                                <th >Total</th>
                                <th>25</th>
                                <th>20</th>
                                <th>05</th>
                                 
                            </tr>
                             <!--end 2-->
                             <!--end 3-->
                             <!--end 4-->
                             <!--end 5-->
                             <!--end 6-->
                        </table>
                        </div>
        
        <!--2nd  table ends-->
    </div>          
        </div><!--  end tag of content -->
    </div>

    <?php include("sliced/jquery_links.php"); ?>
</body>

</html>