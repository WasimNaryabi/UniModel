<?php include('models/student_dashboard_backend.php'); ?>


            <div class="top-bar">
                <div class="row">
                    <div class="col-md-12">
                        <?php /*include("sliced/top_image.php");*/ ?>
                       
                        
                        
             
             
                        <div  class="col-md-12"style="background-color:white;margin-top:20px;padding:3px;border-radius:20px;margin-right:10px;">
                             
                            
                            <div class="row">
                            
                           <div class="col-md-12">

                            <h3 class="text-center" style="margin-left: 20px;">
                                
                                 <strong >
                                   
                                 <img  height="50px" width="50px" style=" border:1px solid #2c276c;"  src="../admin/images/<?php echo $data['picture_path'];?>" class="img-circle ">



                                <?php echo $data['first_name']." ".$data['last_name']; ?> <small style="font-size:9px;padding: 5px;border-radius: 40px; background-color: #2c276c;color:white;">Student</small>
                                    </strong>
                                  
                                  
                            </h3>
                            </div>
                             
                           </div>
                        </div>
                        
                    </div>  
                     
                </div>
            </div>