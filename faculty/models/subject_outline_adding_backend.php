  <?php 
  session_start();
  include("database_connection.php");

  if(isset($_POST['sub'])){  
$location = '../../outlines/';

  	$discipline      = $_POST['degree'];
  	$session       = $_POST['session'];
  	$semester    = $_POST['semester'];
  	$subject     = $_POST['subject'];
    $faculty_id = $_SESSION['faculty_id'];

/* ======================================== Insertion Query ======================================== */

        $outline= $_FILES['outline']['name'];
    $temp_outline = $_FILES['outline']['tmp_name'];
    
    $outline_extenstion = strtolower(substr($outline,strpos($outline,'.')+1));

    if($outline_extenstion == 'doc' or $outline_extenstion == 'docx' or $outline_extenstion == 'dot'){ 

      if (file_exists($location.$outline)){
        echo "THIS IMAGE   IS ALREADY EXIST";
      }else if(move_uploaded_file($temp_outline,$location.$outline)){
          
        $query = $pdo->query("INSERT INTO course_outlines VALUES('','$faculty_id','$discipline','$session','$semester','$subject','$outline')");

        if($query){
           
          header("location:../subject_outline.php?msg=Outline Updloaded Successfully");
        }else{
          echo "QUERY PROBLEM";
        }
      }
    }else{echo "file extention not matching";}
    //end of if statements
  }//end of isset statements


   ?>