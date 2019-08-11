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
             
                    <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <?php /*include("sliced/top_image.php");*/ ?>
                        <div  class="col-md-12"style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-right:10px;">
                            <h2 class="text-center">
                                 Student Personal Info
                            </h2>
                        <table class="table table-responsive table-hover table-stripped">
                            <tr>
                                 
                                <th>Full Name</th>
                                <td>Bilal Hussain</td>
                                <th>Father Name</th>
                                <td>Muhammad Khan</td>
                                
                            </tr>
                            
                            <tr>
                                <th>Date Of Birth</th>
                                <td>11/02/2019</td>
                                <th>Place Of Birth</th>
                                <td>Distt Peshawar</td>
                            </tr>
                            <tr>
                                <th>Mobile No</th>
                                <td>0300-5974777</td>
                                <th>CNIC</th>
                                <td>15201-7623722-1</td>
                            </tr>
                            
                            <tr>
                                <th>Email</th>
                                <td>abc@gmail.com</td>
                                <th>Address</th>
                                <td>Village Galoch, Tehsil Kabal District Swat</td>
                            </tr>
                             
                        </table>
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