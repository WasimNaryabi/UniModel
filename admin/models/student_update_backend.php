<?php
include("database_connection.php");
session_start();
/* SESSION CREATION. */

  
/* ======================================== Searching Student(s) from Database ======================================== */

  if(isset($_POST['search'])) {
    
    $session = $_POST['session'];
    $discipline = $_POST['discipline'];
    $roll_number = $_POST['roll_number'];
          /*echo $session."/".$discipline."/".$roll_number;exit();*/
/* ======================================== Select Query for Retrival of Student Record ======================================== */
  
    $query_search =$pdo->prepare("select * from student where discipline_id = '$discipline' and session_id = '$session' and roll_number = '$roll_number';");
   $query_search->setFetchMode(PDO::FETCH_ASSOC);
    $query_search->execute();
    $count =  $query_search->fetch();
    
    if($count) {
      
       

/* Student SESSION Creation */
  
  $_SESSION['student_id'] = $count['student_id'];
        header("location:../specific_student_update.php");

      } else {
?>
          <script>
                        alert("Incorrect Registration No. or Password...");
                        location.replace("../student_update.php");
                    </script>
<?php
    }
  }
?>

 