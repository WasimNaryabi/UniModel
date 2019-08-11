<?php
 
/* SESSION CREATION. */
 $admin_id = $_SESSION['admin_id'];

/* ======================================== Select Query for Retrival of specific User from Database ======================================== */
        $query_select = $pdo->prepare("select * from admin where admin_id = '$admin_id';");
         $query_select->setFetchMode(PDO::FETCH_ASSOC);
         $query_select->execute();
         $row  =  $query_select->fetch();

/* ====================== SESSION Student created ====================== */

    $student_id = $_SESSION['student_id'];
 
    $query_student_history =$pdo->prepare("select max(student_history_id) as sh_id from student_history where student_id = '$student_id';");
    $query_student_history->setFetchMode(PDO::FETCH_ASSOC);
         $query_student_history->execute();
         $show_st_id  =  $query_student_history->fetch();
    
    
    $student_history_id = $show_st_id['sh_id']."<br />";
    
    $query_specific_student = $pdo->prepare("select * from student_history as sh, student as st, semester as s, session as ses, discipline as d where
                               st.student_id = sh.student_id and sh.student_history_id = '$student_history_id' and s.semester_id = sh.semester_id and
                               st.session_id = ses.session_id and d.discipline_id = st.discipline_id;");
     
    $query_specific_student->setFetchMode(PDO::FETCH_ASSOC);
    $query_specific_student->execute();
    $show = $query_specific_student->fetch();
    $name = $show['first_name']." ".$show['last_name'];;
    $father_name = $show['father_name'];
    $gender = $show['gender'];
    $city = $show['city'];
    $country = $show['country'];
    $student_id = $show['student_id'];
    
    $birth_date = $show['date_of_birth'];
    $explode_date = explode("-", $birth_date);
    $date = $explode_date[2];
    $month = $explode_date[1];
    $year = $explode_date[0];
    
    $birth_date = $date."/".$month."/".$year;
    
    if($gender == "male") {
            $sign = " S/O ";
        } else {
            $sign = " D/O ";
        }
    
    $full_name = $name.$sign.$father_name;
$location = '../student/images/';

?>