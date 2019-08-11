<?php 
 
include("database_connection.php");
 
  
/* SESSION CREATION. */
    if(isset($_POST['display'])) {
        
        $discipline = $_POST['discipline'];
        $session = $_POST['session'];
        $semester = $_POST['semester'];
        
        $_SESSION['discipline'] = $discipline;
        $_SESSION['session'] = $session;
        $_SESSION['semester'] = $semester;
        
        $select_student_catagory = $pdo->prepare("select * from student as s, student_history as sh where s.discipline_id = '$discipline' and s.session_id ='$session'
                                    and sh.semester_id = '$semester' and s.student_id = sh.student_id");
        $select_student_catagory ->setFetchMode(PDO::FETCH_ASSOC);
        $select_student_catagory ->execute();
        $count  = $select_student_catagory ->fetch();
         
        
        if($count == "") { 
        	 echo "
					<script>
                        alert('No Record Found...'); 
                        location.replace('overall_semester_record.php');
                    </script> 
        	 ";         
        $i = 1;
        }  

    }
    ?>