  <?php 
  session_start();
  include("database_connection.php");

  if(isset($_POST['sub'])){  
$location = '../../lectures/';

  	$discipline      = $_POST['degree'];
  	$session       = $_POST['session'];
  	$semester    = $_POST['semester'];
  	$subject     = $_POST['subject'];
    $topic    = $_POST['topic'];
  	$week     = $_POST['week'];
    $faculty_id = $_SESSION['faculty_id'];

/* ======================================== Insertion Query ======================================== */

        $lecture= $_FILES['lecture']['name'];
    $temp_outline = $_FILES['lecture']['tmp_name'];
    
    $extention = strtolower(substr($lecture,strpos($lecture,'.')+1));

    if($extention == "jpg" or $extention == "jpeg" or $extention == "png" or $extention == "dox/docx" or $extention == "doc" or $extention == "docx" or $extention == "ppt" or $extention == "pptx" or $extention == "ppt/pptx"){ 

      if (file_exists($location.$lecture)){
        echo "THIS IMAGE   IS ALREADY EXIST";
      }else if(move_uploaded_file($temp_outline,$location.$lecture)){
          
        $query = $pdo->query("INSERT INTO subject_lectures VALUES('','$faculty_id','$discipline','$session','$semester','$subject','$topic','$week','$lecture')");

        if($query){
           
          header("location:../lecture_upload.php?msg=Outline Updloaded Successfully");
        }else{
          echo "QUERY PROBLEM";
        }
      }
    }else{echo "file extention not matching";}
    //end of if statements
  }//end of isset statements


   ?>